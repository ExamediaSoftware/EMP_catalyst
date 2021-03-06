<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Application extends Model
{
    use HasFactory;

    protected $with = [
        'representative', 'ownership', 'financial', 'employee', 'business_issue',
        'leadership_issue', 'media', 'status', 'currentStatus', 'sectionComment'
    ];

    protected $fillable = [
        'user_id', 'company_name', 'business_reg_no', 'business_reg_year', 'company_type',
        'sector_type', 'business_desc', 'address_line1', 'address_line2',
        'postcode', 'city', 'state', 'office_number',
        'fax_number', 'acknowledgement',

    ];

    protected $appends = ['address', 'state_name'];

    public function getAddressAttribute()
    {
        $address = $this->address_line1 . ', ' . $this->address_line2 . ':' . $this->postcode . ': '
            . $this->city . ', ' . $this->state_name;
        return $address;
    }

    public function getStateNameAttribute()
    {
        // dd($this->state);
        if($this->state != null){
            return Parameter::where('type_id','=',$this->state)->first()->type_name;
        }

    }

    public function getCompanyTypeNameAttribute()
    {
        return Parameter::where('type_id','=',$this->company_type)->first()->type_name;
    }

    public function getSectorTypeNameAttribute()
    {
        return Parameter::where('type_id','=',$this->sector_type)->first()->type_name;
    }

    public function representative()
    {
        return $this->hasMany(Representative::class);
    }

    public function ownership()
    {
        return $this->hasMany(Ownership::class);
    }

    public function financial()
    {
        return $this->hasMany(Financial::class);
    }

    public function employee()
    {
        return $this->hasMany(Employee::class);
    }

    public function business_issue()
    {
        return $this->hasMany(AssistanceBusinessIssue::class);
    }

    public function leadership_issue()
    {
        return $this->hasMany(AssistanceLeadershipIssue::class);
    }

    public function media()
    {
        return $this->hasMany(Media::class);
    }

    public function status()
    {
        return $this->hasMany(ApplicationStatus::class);
    }

    public function currentStatus2()
    {
        return Get_ApplicationStatus($this->getKey());
    }

    public function currentStatus()
    {
        return $this->hasOne(ApplicationStatus::class)->latest();
    }

    public function sectionComment()
    {
        return $this->hasMany(SectionComment::class);
    }
}
