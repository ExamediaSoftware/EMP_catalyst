<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class ApplicationStatus extends Model
{
    use HasFactory;

    protected $fillable = [
        'application_id', 'status_id', 'created_by',
    ];

    // public function getStatusIdAttr($value)
    // {
    //     return Parameter::where('type_id', '=', $value)->where('parameter_name', '=', 'application_status')->first();
    // }

    protected function statusId(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => Parameter::select('type_name')->where('type_id', '=', $value)->where('parameter_name', '=', 'application_status')->first()->type_name,
        );
    }
}
