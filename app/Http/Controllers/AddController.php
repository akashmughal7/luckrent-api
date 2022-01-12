<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Requestreference;
use App\Models\Add;
use App\Models\Property;
use App\Models\Lease;
use DB;
class AddController extends Controller
{
    //createAdd
    public function createAdd(Request $request){

        $property_data = Property::where('id',$request->property_id)->get();  
       
        $lease_data = Lease::where('property_id',$property_data[0]['id'])->get();  
 
        $add_id = DB::table('adds')->insertGetId([
          'user_id' => auth()->user()->id,
          'lease_id'=> $lease_data[0]['id'],
          'property_id' =>  $request->property_id,
          'renter_id' =>  $lease_data[0]['renter_id'],
          'lease' => $request->lease,
          'rent' => $request->rent,
          'startadd_date' => $request->startadd_date,
          'endadd_date' => $request->endadd_date,
          'description' => $request->description,
      ]);

      $add_data = DB::table('adds')->where('id',$add_id)->get();  
      return response()->json([
          'message' => 'Add has been created',
          'add'=>  $add_data

      ], 201);
    } 
 //CreateRequest
 public function createRequest(Request $request){

    $add_data = Add::where('id',$request->add_id)->get();  

    $renter_id = DB::table('requests')->insertGetId([
        'user_id' => auth()->user()->id,
        'add_id'=>$add_data[0]['id'],
        'property_id' => $add_data[0]['property_id'],
        'renter_id' =>   $add_data[0]['renter_id'],
        'message' => $request->message,
        'score' => $request->score,
        'occupent' => $request->occupent,
        'pet'=>$request->pet,
        'smoke'=>$request->smoke,
        'occupation'=>$request->occupation,
    ]);
  $references = $request->get('references');
  $reference = [];
  if($references){
  foreach ($references as $unit) {
      $reference[] = [
        'user_id' => auth()->user()->id,
        'add_id'=>$add_data[0]['id'],
        'property_id' => $add_data[0]['property_id'],
        'renter_id' =>   $add_data[0]['renter_id'],
          'type' => $unit['type'],
          'name' => $unit['name'],
          'phone_no' => $unit['phone_no'],
          'email'=>$unit['email'],
      ];
  }  }
 
  Requestreference::insert($reference);
  return response()->json([
      'message' => 'Request has been Sended',
  ], 201);

}

//Accept or reject Request
 public function changeRequestStatus(Request $request){
    
    if($request->status == "0") 
    { 
        return response()->json(['message' => 'Request has been Rejected', ], 201);
    } 
    if($request->status == "1")
    { 
        DB::table('requests')->where('id', $request->request_id)->update(['status' => true]);
        return response()->json(['message' => 'Request has been Accepted'], 201);
    }
  }
    //ViewApplication
    public function viewApplication(Request $request){

        $property_data = Property::where('id',$request->property_id)->get();  
       
        $lease_data = Lease::where('property_id',$property_data[0]['id'])->get();  
 
        $add_id = DB::table('adds')->insertGetId([
          'user_id' => auth()->user()->id,
          'lease_id'=> $lease_data[0]['id'],
          'property_id' =>  $request->property_id,
          'renter_id' =>  $lease_data[0]['renter_id'],
          'description' => $request->description,
      ]);

      $add_data = DB::table('adds')->where('id',$add_id)->get();  
      return response()->json([
          'message' => 'Add has been created',
          'add'=>  $add_data
      ], 201);

    }

    //Add-Details
    public function addDetails(Request $request){

        $add_data =Add::where('id',$request->add_id)->get();

        $size_data = DB::table('systemsizes')->where('property_id',$add_data[0]['property_id'])->get();  
     
        $lease_data = DB::table('leases')->where('id',$add_data[0]['lease_id'])->get();
       
        return response()->json([
            'message' => 'Add details',
            'add'=>  $add_data,
            'SystemSize'=> $size_data ,
            'lease'=> $lease_data
        ], 201);

    }

}
