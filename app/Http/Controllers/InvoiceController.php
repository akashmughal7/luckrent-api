<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Leases;
use App\Models\Payment;
use App\Models\Leasesfile;
use Carbon\Carbon;
Use App\Models\addInvoice;
Use App\Models\Invoice;
use DB;
class InvoiceController extends Controller
{
    // AddInvoice
public function addInvoice(Request $request){

    $invoice_id = DB::table('invoices')->insertGetId([
      'user_id' => auth()->user()->id,
      'property_id' =>  $request->property_id,
      'category'=> $request->category,
      'invoice_type'=>$request->invoice_type,
      'recipient'=>$request->recipient,
      'invoice_notes'=>$request->invoice_notes,
      'issued_date'=>$request->issued_date,
      'ended_date'=>$request->ended_date,
      'created_at' => Carbon::now(),
  ]);
  return response()->json([
    'message' => 'Invoice has been added',
], 201);
}

// allInvoice
public function allInvoice(Request $request){

  $property_id = DB::table('properties')->where('user_id', auth()->user()->id)->get();
if(!$property_id){
  return response()->json([
    'message' => 'You have no any property'
  ], 201);
}

  $invoices = DB::table('invoices')->where('user_id', auth()->user()->id)->get(); 
      return response()->json([
        'message' => 'All Invoice about your property',
        "Invoices" =>$invoices
      ], 201);
  }


// renterInvoice
public function renterInvoice(Request $request){

$renter_property = DB::table('properties')
->where('property', $request->property)
->where('created_at', $request->time_period)->get();
if(!$renter_property ){
  return response()->json([
    'message' => 'You have no property'
  ], 201);
}
$property_id=$renter_property->pluck('id')->toArray();

$renter_invoice=Invoice::where('property_id',$property_id)->get();
 
      return response()->json([
        'message' => 'Renter Invoice',
        "Renter_property" =>$renter_property,
        "Renter-propertyInvoice" =>$renter_property,
      ], 201);
  }



  
}