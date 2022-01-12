<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Leases;
use App\Models\Payment;
use App\Models\Leasesfile;
use DB;

class AddLeaseController extends Controller
{
  
// AddLease
public function addLease(Request $request){

    $leases_id = DB::table('leasess')->insertGetId([
        'user_id' => auth()->user()->id,
        'property_code' =>  $request->property_code,
        'property_status' =>   $request->property_status,
    ]);
  
    $image=$request->file('file');
    $imageName='';
        $new_name=rand().'.'.$image->getClientOriginalExtension();
        $path=$image->move(public_path('/uploads/leasefiles'),$new_name);
        $imageName=$new_name;
        $leases_id = DB::table('leasessfiles')->insertGetId([
            'user_id' => auth()->user()->id,
            'property_code' => $request->property_code,
            'leasess_id'=> $leases_id,
            'title' => $imageName,
            'path' => $path,
        ]);
// Add Payment
$payment_id = DB::table('payments')->insertGetId([
    'user_id' => auth()->user()->id,
    'property_code' => $request->property_code,
    'leasess_id'=> $leases_id,
    'income_method' => $request->income_method,
    'payer'=>$request->payer,
    'amount'=>$request->amount,
    'paid_with'=>$request->paid_with,
    'recieved_date'=>$request->recieved_date,
    'from_date'=>$request->from_date,
    'tex_status'=>$request->tex_status,
    'payment_notes'=>$request->payment_notes,
]);

return response()->json([
    'message' => 'Your Lease & Payment Method has been added'
], 201);

}


}
