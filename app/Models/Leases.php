<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Leases extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id', 'property_code','propert_status',
    ];
}
