<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Leases;
use App\Models\Payment;
use App\Models\Leasesfile;
use App\Models\Expense;
use App\Models\ExpenseFile;
use DB;
class ExpenseController extends Controller
{
    //
    public function addExpense(Request $request){

        $expense_id = DB::table('expenses')->insertGetId([
          'user_id' => auth()->user()->id,
          'property_id' =>  $request->property_id,
          'property' =>  $request->property,
          'tenant' =>  $request->tenant,
          'expense_category' =>  $request->expense_category,
         'amount'=>  $request->amount,
         'transaction_date'=>  $request->transaction_date,
         'repeat'=>  $request->repeat,
         'as_paid'=>  $request->as_paid,
         'payee'=>  $request->payee,
         'expense_description'=>  $request->expense_description,
         'expanse_type' => $request->expanse_type,
          'amount_x' => $request->amount_x,
          'category_x' => $request->category_x,
          'status' => $request->status,
          'on_paid' => $request->on_paid,
          'tax_status' => $request->tax_status,
          'rent_invoice' => $request->rent_invoice,
          'recurring' => $request->recurring,
          'expense_notes' => $request->expense_notes,
      ]);

      $images=$request->file('file');
      $imageName='';
      if($images){
      foreach($images as $image){
          $new_name=rand().'.'.$image->getClientOriginalExtension();
          $path=$image->move(public_path('/uploads/expensefiles'),$new_name);
          $imageName=$new_name;
        DB::table('expensefiles')->insertGetId([
            'user_id' => auth()->user()->id,
            'property_id' =>  $request->property_id,
            'title' =>  $imageName,
            'path' =>  $path
        ]);
    }}
    return response()->json([
        'message' => 'Expenses has been added',
    ], 201);
    
    }
}
