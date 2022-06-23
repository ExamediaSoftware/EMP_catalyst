<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssistanceLeadershipIssue extends Model
{
    use HasFactory;

    protected $fillable = [
        'application_id',
        'issue',     
    ];

    protected $appends = ['issue_name'];

    public function getIssueNameAttribute()
    {
        return Parameter::where('type_id','=',$this->issue)->first()->type_name;
    }
}
