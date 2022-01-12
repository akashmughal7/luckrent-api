<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $fillable = [ 
        'role','proerty','property_code','property_address','property_postalcode','unit','tenant_name','tenant_key','tenant_locker','tenant_parking','tenant_rent', 'utility_share','created_at','updated_at'
    ];

}
