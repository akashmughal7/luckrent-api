<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inspection extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id', 'property_id','first_name','middle_name',
        'last_name','street_no','unit','province','postal_code','inspection'
    ];

}
