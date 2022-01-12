<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EntryCondition extends Model
{
    use HasFactory;
    protected $fillable = [
        'inspection_id','user_id', 'property_id','inspectiontenant_id','unit_name',
        'entry_condition','entry_comments'
    ];
}
