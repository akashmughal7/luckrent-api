<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //
    /**
     * Create user
     *
     * @param  [string] name
     * @param  [string] email
     * @param  [string] password
     * @param  [string] password_confirmation
     * @return [string] message
     */
    public function signup(Request $request)
    {
     
        $request->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'phone_no' => 'required|digits:11|numeric',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string',
            'location' => 'required|string',
            'country' => 'required|string',
            'state' => 'required|string',
            'language' => 'required|string',
            'role' => 'required', 
            'unit' => 'required', 
            'rupees' => 'required', 
      ]); 
       
        $user = new User([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone_no'=>$request->phone_no,
            'location'=>$request->location,
            'country'=>$request->country,
            'state'=>$request->state,
            'language'=>$request->language,
            'rupees'=>$request->rupees,
            'unit'=>$request->unit,
            'role'=>$request->role,
            'password' => bcrypt($request->password),
            'activation_token' => Str::random(40),
        ]);
        $user->save();
        return response()->json([
            'message' => 'Conratulations! You are off to a grate start',
            'data'=>$user,
        ], 201);
    }


    public function editProfile(Request $request)
    {

        $request->validate([
            'first_name' => 'string',
            'last_name' => 'string',
            'phone_no' => 'digits:11|numeric',
            'email' => 'string|email|unique:users',
            'language'=>'string',
            'member_id'=>'string',
            'role'=>'string',
        ]);
     
    $user = User::where('email', auth()->user()->email)->first();
    $user->first_name = ($request->first_name) ? $request->first_name : $user->first_name;
    $user->last_name = ($request->last_name) ? $request->last_name : $user->last_name;
    $user->phone_no = ($request->phone_no) ? $request->phone_no : $user->phone_no;
    $user->email = ($request->email) ? $request->email : $user->email;
    $user->member_id = ($request->member_id) ? $request->member_id : $user->member_id;
    $user->language = ($request->language) ? $request->language : $user->language;
    $user->role = ($request->role) ? $request->role : $user->role;
    $images=$request->file('profile_picture');
    $new_name=rand().'.'.$images->getClientOriginalExtension();   
    $path=$images->move(public_path('/uploads/profiles'),$new_name);   
    $imageName=$new_name;
        $user->profile_picture = $imageName;
        $user->path = $path;
        $user->save();
        return response()->json([
            'message' => 'Your profile has been updated',
            'data'=>$user,
        ], 201);
    }

    
     /**
     * Login user and create token
     *
     * @param  [string] email
     * @param  [string] password
     * @param  [boolean] remember_me
     * @return [string] access_token
     * @return [string] token_type
     * @return [string] expires_at
     */
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
            'remember_me' => 'boolean'
        ]);
        $credentials = request(['email', 'password']);
      
        $credentials['active'] = 1;
        $credentials['deleted_at'] = null;

        if(!Auth::attempt($credentials))
            return response()->json([
                'message' => 'Unauthorized'
            ], 401);
        $user = $request->user();
        $tokenResult = $user->createToken('Personal Access Token');
        $token = $tokenResult->token;
        if ($request->remember_me)
            $token->expires_at = Carbon::now()->addWeeks(1);
        $token->save();
        return response()->json([
            'data'=>$user,
            'access_token' => $tokenResult->accessToken,
            'token_type' => 'Bearer',
            'expires_at' => Carbon::parse(
                $tokenResult->token->expires_at
            )->toDateTimeString()
        ]);
    }
    /**
     * Logout user (Revoke the token)
     *
     * @return [string] message
     */
    public function logout(Request $request)
    {

        $request->user()->token()->revoke();
        return response()->json([
            'message' => 'Successfully logged out'
        ]);
    }
  

    /**
     * Get the authenticated User
     *
     * @return [json] user object
     */
    public function user(Request $request)
    {
        return response()->json($request->user());
    }

}
