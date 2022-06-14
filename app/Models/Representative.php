<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Representative extends Model
{
    use HasFactory;

    protected $fillable = [
        'application_id',
        'rep_name',
        'rep_position',
        'rep_age',
        'rep_email',
        'rep_phone',
        'rep_as',
    ];
}
