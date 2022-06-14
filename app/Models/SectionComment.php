<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SectionComment extends Model
{
    use HasFactory;

    protected $fillable = [
        'application_id',
        'application_status_id',
        'section',
        'comment',
        
    ];
}
