<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Occupant extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id', 'property_id','renter_id','name2','name1','name3'
    ];
}
