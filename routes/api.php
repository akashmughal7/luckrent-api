<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PasswordResetController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\RenterController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\AddController;
use App\Http\Controllers\AddLeaseController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\InspectionController;
use App\Http\Controllers\MyReportController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
    // Login
    Route::post('login', [AuthController::class, 'login']);
    // SignUp
    Route::post('signup', [AuthController::class, 'signup']);

    //API
    Route::group(['middleware' => 'auth:api'], function() {

    // Edit Profile
    Route::post('edit-profile', [AuthController::class, 'editProfile']);

    /********************
        landlord side
    *********************/
    // addSingleUnit-property
    Route::post('addSingleUnit-property', [PropertyController::class, 'addSingleUnitProperty']);
    // addMultiUnits-property
    Route::post('addMultiUnits-property', [PropertyController::class, 'addMultiUnitsProperty']);
    
    //Overview
    //AddProperty-Button*******
    // add photo Button
    Route::post('addProperty-photo', [PropertyController::class, 'addPropertyPhoto']);
    // add Renter Button
    Route::post('add-renter', [RenterController::class, 'addRenter']);

    //Documents
    // Create Folder Button
    Route::post('create-folder', [DocumentController::class, 'createFolder']);
    // Add Document Button
    Route::post('add-document', [DocumentController::class, 'addDocument']);

    //Skip*************
    // View
    Route::post('View',);
    // Download
    Route::post('download',);
    // Share
    Route::post('share',);

    //Write An Add Button 
    Route::post('create-add', [AddController::class, 'createAdd']);
    //Create Request for add  
    Route::post('send-request', [AddController::class, 'createRequest']);
    //Accept or Reject Request   
    Route::post('changeRequest-status', [AddController::class, 'changeRequestStatus']);
    //View application Button on add screen 
    Route::post('view-application', [AddController::class, 'viewApplication']);
    //View Add Details Button on add screen 
    Route::post('add-details', [AddController::class, 'addDetails']);

    //Add Property Button
    //Add Lease Button 
    Route::post('add-lease', [AddLeaseController::class, 'addLease']);
    //View Payment Details -Skip
    Route::post('payment-detail', [AddLeaseController::class, 'paymentDetail']);
    //Inspection Report Button 
    Route::post('inspection-report', [ReportController::class, 'inspectionReport']);

    //Add Invoice Button 
    Route::post('add-invoice', [InvoiceController::class, 'addInvoice']);
    //View Invoice Detail -skip
    Route::post('invoice-detail', [InvoiceController::class, 'invoiceDetail']);
    //Add Expenses 
    Route::post('add-expense', [ExpenseController::class, 'addExpense']);
    //View Expenses 
    Route::post('view-expense', [ExpenseController::class, 'viewExpense']);
    //Inspection Report  
    Route::post('inspection-report', [InspectionController::class, 'inspection']);
    //My Report  
    Route::post('my-report', [MyReportController::class, 'myReport']);
   
    //Chat  
    Route::post('chat', [ChatController::class, 'Chat']);



    /********************
        Renter side
    *********************/

    // Renter-dashboard
    Route::post('renter-dashboard', [RenterController::class, 'renterDashboard']);
    // View all Renter-Invoice
    Route::post('all-invoice', [InvoiceController::class, 'allInvoice']);
    // Renter-Invoice according to the time period
    Route::post('renter-invoice', [InvoiceController::class, 'renterInvoice']);
    // Pay payment
    Route::post('pay-payment', [InvoiceController::class, 'payPayment']);

    // Password_reset
    Route::post('forget-password', [PasswordResetController::class, 'create']);
    Route::post('password-reset', [PasswordResetController::class, 'reset']);
        // Logout
        Route::post('logout', [AuthController::class, 'logout']);
        Route::post('user', [AuthController::class, 'user']);
    });


