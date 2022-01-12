<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EndCondition extends Model
{
    use HasFactory;
    protected $fillable = [
        'inspection_id','user_id', 'property_id','inspectiontenant_id','unit_name',
        'end_condition','end_comments'
    ];
}
