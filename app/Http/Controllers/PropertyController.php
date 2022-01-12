<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property;
use App\Models\Image;
use App\Models\Systemsize;
use Carbon\Carbon;
use DB;
class PropertyController extends Controller
{

// Multi Units Property
public function addMultiUnitsProperty(Request $request){

    $request->validate([
        'role' => 'required',
        'property' => 'required',
        'property_code' => 'required',
        'property_address' => 'required',
        'property_postalcode' => 'required',
        'unit' => 'required',
        'tenant_name' => 'required',
        'tenant_key' => 'required',
        'tenant_locker'=> 'required',
        'tenant_parking'=> 'required',
        'tenant_rent'=> 'required',
        'utility_share'=> 'required',
  ]); 
   
  $property_id = DB::table('properties')->insertGetId([
    'user_id' => auth()->user()->id,
    'role' => $request->role,
    'property' =>  $request->property,
    'property_type' =>  'MultiUnitsProperty',
    'property_code' =>  $request->property_code,
    'property_address' => $request->property_address,
    'property_postalcode' => $request->property_postalcode,
    'unit' =>  $request->unit,
    'tenant_name' =>   $request->tenant_name,
    'tenant_key' => $request->tenant_key,
    'tenant_locker'=> $request->tenant_locker,
    'tenant_parking'=> $request->tenant_parking,
    'tenant_rent'=> $request->tenant_rent,
    'utility_share'=> $request->utility_share,
    'created_at' => Carbon::now(),
]);
$property=Property::where('id',$property_id)->get();
$images=$request->file('image');
$imageName='';
if($images){
foreach($images as $image){
    $new_name=rand().'.'.$image->getClientOriginalExtension();
    $path=$image->move(public_path('/uploads/propertiesdata'),$new_name);
    $imageName=$new_name;
    $save = new Image();
    $save->title = $imageName;
    $save->path = $path;
    $save->user_id = auth()->user()->id;
    $save->property_id = $property_id;
    $save->save();
}}
$unitss = $request->get('units');
$units = [];
foreach ($unitss as $unit) {
    $units[] = [
        'user_id' =>  auth()->user()->id,
        'property_id' =>   $property_id,
        'property_unit' =>   $property[0]['unit'],
        'unit_name' => $unit['unit_name'],
        'unit_value' => $unit['unit_value'],
    ];
}  
Systemsize::insert($units);
$property_unit=Systemsize::where('property_id',$property_id)->get();
    return response()->json([
        'message' => 'Your Multi Units Property has been added',
        'property' => $property,
        'property_units'=>$property_unit
    ], 201);
}

//Sigle Unit Property
public function addSingleUnitProperty(Request $request){

    $request->validate([
        'role' => 'required',
        'property' => 'required',
        'property_code' => 'required',
        'property_address' => 'required',
        'property_postalcode' => 'required',
        'unit' => 'required',
        'tenant_name' => 'required',
        'tenant_key' => 'required',
        'tenant_locker'=> 'required',
        'tenant_parking'=> 'required',
        'tenant_rent'=> 'required',
        'utility_share'=> 'required',
  ]); 
   
  $property_id = DB::table('properties')->insertGetId([
    'user_id' => auth()->user()->id,
    'role' => $request->role,
    'property' =>  $request->property,
    'property_type' => 'SingleUnitProperty',
    'property_code' =>  $request->property_code,
    'property_address' => $request->property_address,
    'property_postalcode' => $request->property_postalcode,
    'unit' =>  $request->unit,
    'tenant_name' =>   $request->tenant_name,
    'tenant_key' => $request->tenant_key,
    'tenant_locker'=> $request->tenant_locker,
    'tenant_parking'=> $request->tenant_parking,
    'tenant_rent'=> $request->tenant_rent,
    'utility_share'=> $request->utility_share,
    'created_at' => Carbon::now(),
]);
$property=Property::where('id',$property_id)->get();
$images=$request->file('image');
$imageName='';
if($images){
foreach($images as $image){
    $new_name=rand().'.'.$image->getClientOriginalExtension();
    $path=$image->move(public_path('/uploads/propertiesdata'),$new_name);
    $imageName=$new_name;
    $save = new Image();
    $save->title = $imageName;
    $save->path = $path;
    $save->user_id = auth()->user()->id;
    $save->property_id = $property_id;
    $save->save();
}}
$property_unit = DB::table('systemsizes')->insertGetId([
    'user_id' => auth()->user()->id,
    'property_id' =>   $property_id,
    'property_unit' =>   $property[0]['unit'],
    'unit_name' => $request->unit_name,
    'unit_value' => $request->unit_value,
]);
$property_unit=Systemsize::where('id',$property_unit)->get();
    return response()->json([
        'message' => 'Your Single Unit Property has been added',
        'property' => $property,
        'property_units'=>$property_unit
    ], 201);
} 

//AddProperty-Photo
//Sigle Unit Property
public function addPropertyPhoto(Request $request){

$property=Property::where('id',$request->property_id)->get();
$images=$request->file('image');
$imageName='';
if($images){
foreach($images as $image){
    $new_name=rand().'.'.$image->getClientOriginalExtension();
    $path=$image->move(public_path('/uploads/propertiesdata'),$new_name);
    $imageName=$new_name;
    $save = new Image();
    $save->title = $imageName;
    $save->path = $path;
    $save->user_id = $property[0]['user_id'];
    $save->property_id = $request->property_id;
    $save->save();
}

}
$property_photo=Image::where('property_id',$request->property_id)->get();
    return response()->json([
        'message' => 'Your Property Photo has been added',
        'property' => $property,
        'property_Photo'=>$property_photo
    ], 201);
} 
}
