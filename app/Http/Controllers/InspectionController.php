<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class InspectionController extends Controller
{
    

    // Inspection Report
public function inspection(Request $request){

$inspection_id = DB::table('inspections')->insertGetId([
    'user_id' => auth()->user()->id,
    'property_id' =>  $request->property_id,
    'first_name' =>   $request->first_name,
    'last_name' =>   $request->last_name,
    'middle_name' =>   $request->middle_name,
    'street_no' =>   $request->street_no,
    'unit' =>   $request->unit,
    'province' =>   $request->province,
    'postal_code' =>   $request->postal_code,
    'inspection' =>   $request->inspection,
]);



$inspectiontenant_id = DB::table('inspectiontenants')->insertGetId([
    'user_id' => auth()->user()->id,
    'property_id' =>  $request->property_id,
    'inspection_id'=> $inspection_id ,
    'tenant_firstname' =>   $request->tenant_firstname,
    'tenant_middlename' =>   $request->tenant_middlename,
    'tenant_lastname' =>   $request->tenant_lastname,
    'tenant_streetno' =>   $request->tenant_streetno,
    'tenant_unit' =>   $request->tenant_unit,
    'tenant_province' =>   $request->tenant_province,
    'tenant_postalcode' =>   $request->tenant_postalcode,
    'possession_date' =>   $request->possession_date,
    'movein_date' =>   $request->movein_date,
    'moveout_date' =>   $request->moveout_date,
    'moveininspection_date' =>   $request->moveininspection_date,
    'moveoutinspection_date' =>   $request->moveoutinspection_date,
    'tenantagent_name' =>   $request->tenantagent_name,
    'add_comments' =>   $request->add_comments,
]);

$images=$request->file('image');
$imageName='';
if($images){
foreach($images as $image){
    $new_name=rand().'.'.$image->getClientOriginalExtension();
    $path=$image->move(public_path('/uploads/inspectiondata'),$new_name);
    $imageName=$new_name;
    DB::table('inspectionimages')->insertGetId([
        'user_id' => auth()->user()->id,
        'property_id' =>  $request->property_id,
        'inspection_id'=>$inspection_id ,
        'inspectiontenant_id'=>$inspectiontenant_id,
        'title' =>  $imageName,
        'path' =>  $path

    ]);
}}

$entrycondition_id = DB::table('entryconditions')->insertGetId([
    'user_id' => auth()->user()->id,
    'property_id' =>  $request->property_id,
    'inspection_id'=>$inspection_id ,
    'inspectiontenant_id'=>$inspectiontenant_id,
    'unit_name' =>   $request->unit_name,
    'entry_condition' =>   $request->entry_condition,
    'entry_comments' =>   $request->entry_comments,
]);

$endcondition_id = DB::table('endconditions')->insertGetId([
    'user_id' => auth()->user()->id,
    'property_id' =>  $request->property_id,
    'inspection_id'=>$inspection_id ,
    'inspectiontenant_id'=>$inspectiontenant_id,
    'unit_name' =>   $request->unit_namee,
    'end_condition' =>   $request->end_condition,
    'end_comments' =>   $request->end_comments,
]);

$images=$request->file('condition-image');
$imageName='';
if($images){
foreach($images as $image){
    $new_name=rand().'.'.$image->getClientOriginalExtension();
    $path=$image->move(public_path('/uploads/conditions'),$new_name);
    $imageName=$new_name;
    DB::table('conditionimages')->insertGetId([
        'user_id' => auth()->user()->id,
        'property_id' =>  $request->property_id,
        'inspection_id'=>$inspection_id ,
        'inspectiontenant_id'=>$inspectiontenant_id,
        'entrycondition_id'=>$entrycondition_id,
        'endcondition_id'=>$endcondition_id,
        'title' =>  $imageName,
        'path' =>  $path

    ]);
}}

$tag_id=DB::table('tags')->insertGetId([
    'user_id' => auth()->user()->id,
    'property_id' =>  $request->property_id,
    'inspection_id'=>$inspection_id ,
    'inspectiontenant_id'=>$inspectiontenant_id,
    'entrycondition_id'=>$entrycondition_id,
    'endcondition_id'=>$endcondition_id,
    'tag_name' =>  $request->tag_name,
]);



$tenancy_id=DB::table('tenancies')->insertGetId([
    'user_id' => auth()->user()->id,
    'property_id' =>  $request->property_id,
    'inspection_id'=>$inspection_id ,
    'inspectiontenant_id'=>$inspectiontenant_id,
    'entrycondition_id'=>$entrycondition_id,
    'endcondition_id'=>$endcondition_id,
    'tag_id' =>$tag_id,
    'start_comment'=>$request->start_comment,
    'start_status'=>$request->start_status,
    'end_comment'=>$request->end_comment,
    'end_status'=>$request->end_status,
    'landlord_name'=>$request->landlord_name,
    'landlord_address'=>$request->landlord_address,
]);


$inspectionexpense_id=DB::table('inspectionexpenses')->insertGetId([
    'user_id' => auth()->user()->id,
    'property_id' =>  $request->property_id,
    'inspection_id'=>$inspection_id ,
    'inspectiontenant_id'=>$inspectiontenant_id,
    'entrycondition_id'=>$entrycondition_id,
    'endcondition_id'=>$endcondition_id,
    'tag_id' =>$tag_id,
    'tenancy_id'=>$tenancy_id,
    'tenant_name'=>$request->start_comment,
    'security_deposit'=>$request->security_deposit,
    'damage_deposit'=>$request->damage_deposit,
    'date'=>$request->end_status,
    'landlord_signature_movein'=>$request->landlord_signature_movein,
    'tenant_signature_movein'=>$request->tenant_signature_movein,
]);


$tenantaddress_id=DB::table('tenantaddress')->insertGetId([
    'user_id' => auth()->user()->id,
    'property_id' =>  $request->property_id,
    'inspection_id'=>$inspection_id ,
    'inspectiontenant_id'=>$inspectiontenant_id,
    'entrycondition_id'=>$entrycondition_id,
    'endcondition_id'=>$endcondition_id,
    'tag_id' =>$tag_id,
    'tenancy_id'=>$tenancy_id,
    'inspectionexpense_id'=>$inspectionexpense_id,
    'tenant_site'=>$request->tenant_site,
    'tenant_street_no'=>$request->tenant_street_no,
    'province'=>$request->tenant_provincee,
    'city'=>$request->tenant_city,
    'postal_code'=>$request->tenant_postal_code,
    'tenant_email'=>$request->tenant_email,
]);


$landlordaddress_id=DB::table('landlordaddress')->insertGetId([
    'user_id' => auth()->user()->id,
    'property_id' =>  $request->property_id,
    'inspection_id'=>$inspection_id ,
    'inspectiontenant_id'=>$inspectiontenant_id,
    'entrycondition_id'=>$entrycondition_id,
    'endcondition_id'=>$endcondition_id,
    'tag_id' =>$tag_id,
    'tenancy_id'=>$tenancy_id,
    'inspectionexpense_id'=>$inspectionexpense_id,
    'tenantaddres_id'=>$tenantaddress_id,
    'landlord_firstname'=>$request->landlord_firstname,
    'landlord_lastname'=>$request->landlord_lastname,
    'landlord_middlename'=>$request->landlord_middlename,
    'address'=>$request->address,
    'landlord_unit'=>$request->landlord_unit,
    'landlord_street_no'=>$request->landlord_street_no,
    'province'=>$request->landlord_province,
    'city'=>$request->landlord_city,
    'postal_code'=>$request->landlord_postal_code,
]);

$images=$request->file('expense-image');
$imageName='';
if($images){
foreach($images as $image){
    $new_name=rand().'.'.$image->getClientOriginalExtension();
    $path=$image->move(public_path('/uploads/expenseimages'),$new_name);
    $imageName=$new_name;
DB::table('inspectionexpensesfiles')->insertGetId([
    'user_id' => auth()->user()->id,
    'property_id' =>  $request->property_id,
    'inspection_id'=>$inspection_id ,
    'inspectiontenant_id'=>$inspectiontenant_id,
    'entrycondition_id'=>$entrycondition_id,
    'endcondition_id'=>$endcondition_id,
    'tag_id' =>$tag_id,
    'tenancy_id'=>$tenancy_id,
    'inspectionexpense_id'=>$inspectionexpense_id,
    'tenantaddres_id'=>$tenantaddress_id,
    'landlordaddres_id'=>$landlordaddress_id,
    'title' =>  $imageName,
    'path' =>  $path

]);}}

return response()->json([
    'message' => 'Inspection report add',
], 201);

}

}
