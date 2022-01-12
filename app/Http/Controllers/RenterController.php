<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Renter;
use App\Models\Lease;
use App\Models\Occupant;
use App\Models\Reference;
use App\Models\Reminder;
use App\Models\RentPayment;
use App\Models\EmergencyContact;
use App\Models\EmploymentDetail;
use DB;

class RenterController extends Controller
{
    // AddRenter
public function addRenter(Request $request){


    
  $renter_id = DB::table('renters')->insertGetId([
    'user_id' => auth()->user()->id,
    'property_id' =>  $request->property_id,
    'renter_type' =>   $request->renter_type,
    'first_name' => $request->first_name,
    'last_name' => $request->last_name,
    'email' => $request->email,
    'phone_no'=>$request->phone_no,
    'cnic_image'=>$request->cnic_image,
    'messagingapp'=>$request->messagingapp,
]);

        $images=$request->file('cnic_image');
        $imageName='';
        if($images){
        foreach($images as $image){
            $new_name=rand().'.'.$image->getClientOriginalExtension();
            $path=$image->move(public_path('/uploads/renterdata'),$new_name);
            $imageName=$new_name;
            $save = Renter::where('id',  $renter_id)->first();   
            $save->cnic_image = $imageName;
            $save->path = $path;
            $save->save();
        }}
       
        $renter_data = Renter::where('id', $renter_id)->first(); 
       
        $references = $request->get('references');
        $reference = [];
        if($references){
        foreach ($references as $unit) {
            $reference[] = [
                'user_id' =>  auth()->user()->id,
                'renter_id'=>$renter_id ,
                'property_id' =>   $request->property_id,
                'type' => $unit['type'],
                'name' => $unit['name'],
                'phone_no' => $unit['phone_no'],
                'email'=>$unit['email'],
            ];
        }  }
       

        Reference::insert($reference);

        $reference_data = Reference::where('renter_id',  $renter_id )->get(); 
 
        $employmentdetail_id= DB::table('employmentdetails')->insertGetId([
            'user_id' => auth()->user()->id,
            'property_id' =>  $request->property_id,
            'renter_id' =>  $renter_id,
            'company_name' => $request->company_name,
            'job_title' => $request->job_title,
            'salary' => $request->salary,
            'contact_name'=>$request->contact_name,
            'contact_phone'=>$request->contact_phone,      
        ]);
     
        $employmentdetail_data = DB::table('employmentdetails')->where('renter_id',  $renter_id )->get(); 

        $emergencycontact_id= DB::table('emergencycontacts')->insertGetId([
            'user_id' => auth()->user()->id,
            'property_id' =>  $request->property_id,
            'renter_id' =>  $renter_id,
            'name' => $request->name,
            'phone'=>$request->phone,      
        ]);
        $emergencycontact_data =DB::table('emergencycontacts')->where('renter_id',  $renter_id )->get();  
        $occupant_id= DB::table('occupants')->insertGetId([
            'user_id' => auth()->user()->id,
            'property_id' =>  $request->property_id,
            'renter_id' =>  $renter_id,
            'name1' => $request->name1,
            'name2' => $request->name2,
            'name3' => $request->name3,
        ]);
        $occupant_data =DB::table('occupants')->where('renter_id',  $renter_id )->get(); 
        $lease_id= DB::table('leases')->insertGetId([
            'user_id' => auth()->user()->id,
            'property_id' =>  $request->property_id,
            'renter_id' =>   $renter_id,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'rent' => $request->rent,
            'security_deposit' => $request->security_deposit,
            'pet_deposit' => $request->pet_deposit,
            'rent_due' => $request->rent_due,
        ]);
        $lease_data =DB::table('leases')->where('renter_id',  $renter_id )->get(); 
        $reminder_id= DB::table('reminders')->insertGetId([
            'user_id' => auth()->user()->id,
            'property_id' =>  $request->property_id,
            'renter_id' =>   $renter_id,
            'renewal' => $request->renewal,
            'increase' => $request->increase,
            'overdue' => $request->overdue,
        ]);
        $reminder_data =DB::table('reminders')->where('renter_id',  $renter_id )->get(); 
        $rentpayment_id= DB::table('rentpayments')->insertGetId([
            'user_id' => auth()->user()->id,
            'property_id' =>  $request->property_id,
            'renter_id' =>   $renter_id,
            'paymant_method' => $request->paymant_method,
            'recieved_cheque' => $request->recieved_cheque,
            'reminded_cheque' => $request->reminded_cheque,
        ]);
        $rentpayment_data =DB::table('rentpayments')->where('renter_id',  $renter_id )->get(); 
        return response()->json([
            'message' => 'Renter has been added',
            'Renter' => $renter_data,
            'References'=>$reference_data,
            'EmergencyContacts'=>$emergencycontact_data,
            'EmploymentDetails'=>$employmentdetail_data,
            'Occupant'=> $occupant_data,
            'Lease'=> $lease_data,
            'Reminder'=> $reminder_data,
            'Rentpayment'=> $rentpayment_data
        ], 201);



    }



      // RenterDashboard
      public function renterDashboard(Request $request){

       dd("akash");
       
        $renter_id = DB::table('renters')->insertGetId([
            'user_id' => auth()->user()->id,
            'property_id' =>  $request->property_id,
            'renter_type' =>   $request->renter_type,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone_no'=>$request->phone_no,
            'cnic_image'=>$request->cnic_image,
            'messagingapp'=>$request->messagingapp,
        ]);


    }



}

