<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RentPayment extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'property_id','renter_id','paymant_method','recieved_cheque','reminded_cheque',
    ];
}
