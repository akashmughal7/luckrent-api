<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmploymentDetail extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id', 'property_id','renter_id','company_name','job_title','salary','contact_name','contact_phone',
    ];
}
