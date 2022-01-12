<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Renter extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id', 'property_id','renter_type','first_name','last_name','email','phone_no','messagingapp',
        'cnic_image','path',
    ];
}
