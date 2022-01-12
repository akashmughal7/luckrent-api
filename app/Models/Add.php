<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Add extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id', 'property_id','renter_id','lease','rent','startadd_date','endadd_date','description',
    ];
}
