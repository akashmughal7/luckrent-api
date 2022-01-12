<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reference extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id', 'property_id','renter_id','type','name','phone_no','email','messagingapp',
        'cnic_image','path',
    ];
}
