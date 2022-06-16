<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssistanceBusinessIssue extends Model
{
    use HasFactory;

    protected $fillable = [
        'application_id',
        'issue',
        'issue_priority',
        'issue_desc',
        
    ];

    public function getBusinessIssueNameAttribute()
    {
        return Parameter::where('type_id','=',$this->issue)->first()->subtype_name;
    }
}
