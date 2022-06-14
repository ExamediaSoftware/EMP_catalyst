<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Financial extends Model
{
    use HasFactory;

    protected $fillable = [
        'application_id',
        'financial_year',
        'financial_revenue',
        'financial_expenses',    
    ];
}
