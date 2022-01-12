<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Systemsize extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id','property_id','unit_name','unit_value','unit_type'
    ];
}
