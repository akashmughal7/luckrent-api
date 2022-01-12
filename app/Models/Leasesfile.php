<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Leasesfile extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id', 'property_code','leasess_id','title','path'
    ];
}

