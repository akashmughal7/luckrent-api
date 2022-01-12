<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id', 'property_id','issued_date','ended_date','rental_address',
        'invoice_type','recipient','category','invoice_notes'
    ];
}
