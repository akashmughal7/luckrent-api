<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Notifications\PasswordResetRequest;
use App\Notifications\PasswordResetSuccess;
use App\Models\User;
use App\Models\PasswordReset;
use Illuminate\Support\Str;
class PasswordResetController extends Controller
{
 /**
     * Create token password reset
     *
     * @param  [string] email
     * @return [string] message
     */
    public function create(Request $request)
    {
        
        $fourRandomDigit = rand(1000,9999);
               
        $request->validate([
            'email' => 'required|string|email',
        ]);
        $user = User::where('email', $request->email)->first();     
        if (!$user)
            return response()->json([
                'message' => "We can't find a user with that e-mail address.",
            ], 404);
        $passwordReset = PasswordReset::updateOrCreate(
            ['email' => $user->email],
            ['email' => $user->email,'token' =>  Str::random(60),'otp'=>$fourRandomDigit,]
        );
        if ($user && $passwordReset)
            $user->notify(
                new PasswordResetRequest($fourRandomDigit)
            );
        return response()->json([
            'message' => 'We have e-mailed your password reset OTP!'
        ]);
    }
   

     /**
     * Reset password
     *
     * @param  [string] email
     * @param  [string] password
     * @param  [string] password_confirmation
     * @param  [string] token
     * @return [string] message
     * @return [json] user object
     */
   
    public function reset(Request $request)
    {

       $otp = $request->validate([
            'otp' => 'required|digits:4|numeric|exists:password_resets,otp',
        ]);
        if (!$otp)
            return response()->json([
                'message' => 'This Otp is invalid.'
            ], 404);

       $request->validate([
            'password' => 'required|string|confirmed',
        ]);
        $passwordReset = PasswordReset::where([
            ['otp', $request->otp]
        ])->first();
        if (!$passwordReset)
            return response()->json([
                'message' => 'This Otp is invalid.'
            ], 404); 
        $user = User::where('email',   $passwordReset->email)->first();
        if (!$user)
            return response()->json([
                'message' => "We can't find a user with that e-mail address.",
            ], 404);
        $user->password = bcrypt($request->password);
        $user->save();
        $passwordReset->delete();
        $user->notify(new PasswordResetSuccess($passwordReset));
        return response()->json([
            'message' => 'Your Password has been changed',
            'data'=>$user,
        ], 404);
    }
}
