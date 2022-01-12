<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lease extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id', 'property_id','renter_id','start_date','end_date','rent'
        ,'security_deposit','pet_deposit','rent_due'
    ];
}
