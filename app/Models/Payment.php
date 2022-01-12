<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id', 'property_code','leasess_id','rental_address','income_method','payer','amount','paid_with','recieved_date','from_date','tex_status','payment_notes'
    ];
}
