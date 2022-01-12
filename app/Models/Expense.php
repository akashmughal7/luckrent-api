<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id', 'property_id','property','rental_address',
        'tenant','expense_category','amount','transaction_date',
        'repeat','as_paid','payee','expense_description','expanse_type',
        'amount_x','category_x','status','on_paid','tax_status',
        'rent_invoice','recurring','expense_notes'
    ];
}
