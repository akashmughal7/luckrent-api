<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExpenseFile extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'property_id','rental_address','title','path'
    ];
}

