<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ownership extends Model
{
    use HasFactory;

    protected $fillable = [
        'application_id',
        'shareholder_name',
        'shareholder_percentage',
        'shareholder_race',
        'shareholder_religion',
        'shareholder_gender',
        'shareholder_age',
        'shareholder_no',

    ];
}
