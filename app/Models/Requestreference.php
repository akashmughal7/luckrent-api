<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Requestreference extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id', 'property_id','renter_id','add_id','type','name','phone_no','email'
    ];
}
