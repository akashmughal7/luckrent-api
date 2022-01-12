<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InspectionTenant extends Model
{
    use HasFactory;
    protected $fillable = [
        'inspection_id','user_id', 'property_id','tenant_firstname','tenant_middlename',
        'tenant_lastname','tenant_streetno','tenant_unit','tenant_province','tenant_postalcode','possession_date'
        ,'movein_date','moveout_date','moveininspection_date','moveoutinspection_date','tenantagent_name','add_comments'
    ];
}
