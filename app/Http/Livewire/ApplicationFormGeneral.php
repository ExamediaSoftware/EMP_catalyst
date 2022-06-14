<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Application;
use App\Models\ApplicationStatus;
use App\Models\Representative;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ApplicationFormGeneral extends Component
{
    public $company_name;
    public $business_reg_no;
    public $business_reg_year;
    public $company_type;
    public $sector_type;
    public $business_desc;
    public $address_line1;
    public $address_line2;
    public $postcode;
    public $city;
    public $state;
    public $office_number;
    public $fax_number;
    public $rep_name = [];
    public $rep_position = [];
    public $rep_age = [];
    public $rep_phone = [];
    public $rep_email = [];


    public $application;

    public function mount($application)
    {
        // dd($application);
        $this->application = $application;
        $this->company_name = $application->company_name;
        $this->business_reg_no = $application->business_reg_no;
        $this->business_reg_year = $application->business_reg_year;
        $this->company_type = $application->company_type;
        $this->sector_type = $application->sector_type;
        $this->business_desc = $application->business_desc;
        $this->address_line1 = $application->address_line1;
        $this->address_line2 = $application->address_line2;
        $this->postcode = $application->postcode;
        $this->city = $application->city;
        $this->state = $application->state;
        $this->office_number = $application->office_number;
        $this->fax_number = $application->fax_number;
        // dd($application->representative);    
        if (count($application->representative) > 0) {
            foreach($application->representative as $rep){
                $this->rep_name[] = $rep['rep_name'];
                $this->rep_position[] = $rep['rep_position'];
                $this->rep_age[] = $rep['rep_age'];
                $this->rep_phone[] = $rep['rep_phone'];
                $this->rep_email[] = $rep['rep_email'];
            }
            // $this->rep_name = $application->representative['rep_name']->toArray();
            // $this->rep_position = $application->representative['rep_age']->toArray();
            // $this->rep_age = $application->representative['rep_name']->toArray();
            // $this->rep_phone = $application->representative['rep_phone']->toArray();
            // $this->rep_email = $application->representative['rep_email']->toArray();
        }
        // dd($this->rep_name);
    }

    public function render()
    {
        return view('livewire.application-form-general');
    }

    public function submit(Request $request)
    {
        dd($this);
        $user = Auth::user();
        $validatedData = $this->validate(
            [
                'company_name' => 'required',
                'business_reg_no' => 'required',
                'business_reg_year' => 'required',
                'company_type' => 'required',
                'sector_type' => 'required',
                'business_desc' => 'required',
                'address_line1' => 'required',
                'address_line2' => 'required',
                'postcode' => 'required',
                'city' => 'required',
                'state' => 'required',
                'office_number' => 'required',
                'fax_number' => 'required',


            ],
            [
                'company_name.required' => 'Please fill :attribute',
                'business_reg_no.required' => 'Please fill :attribute',
                'business_reg_year.required' => 'Please fill :attribute',
                'company_type.required' => 'Please fill :attribute',
                'sector_type.required' => 'Please fill :attribute',
                'business_desc.required' => 'Please fill :attribute',
                'address_line1.required' => 'Please fill :attribute',
                'address_line2.required' => 'Please fill :attribute',
                'postcode.required' => 'Please fill :attribute',
                'city.required' => 'Please fill :attribute',
                'state.required' => 'Please fill :attribute',
                'office_number.required' => 'Please fill :attribute',
                'fax_number.required' => 'Please fill :attribute',
                'rep_name.required' => 'Please fill :attribute',
                'rep_position.required' => 'Please fill :attribute',
                'rep_age.required' => 'Please fill :attribute',
                'rep_phone.required' => 'Please fill :attribute',
                'rep_email.required' => 'Please fill :attribute',
            ],
            [
                'company_name' => 'company name',
                'business_reg_no' => 'business registration number',
                'business_reg_year' => 'business registration year',
                'company_type' => 'company type',
                'sector_type' => 'sector type',
                'business_desc' => 'description',
                'address_line1' => 'address 1',
                'address_line2' => 'address 2',
                'postcode' => 'postcode',
                'city' => 'city',
                'state' => 'state',
                'office_number' => 'office number',
                'fax_number' => 'fax number',
            ]
        );
        // dd($user->id);
        $application = Application::create(
            [
                'user_id' => $user->id,
                'company_name' => $this->company_name,
                'business_reg_no' => $this->business_reg_no,
                'business_reg_year' => $this->business_reg_year,
                'company_type' => $this->company_type,
                'sector_type' => $this->sector_type,
                'business_desc' => $this->business_desc,
                'address_line1' => $this->address_line1,
                'address_line2' => $this->address_line2,
                'postcode' => $this->postcode,
                'city' => $this->city,
                'state' => $this->state,
                'office_number' => $this->office_number,
                'fax_number' => $this->fax_number,

            ]
        );

        dd($application);
        return redirect()->to('/application');
    }

    public function update()
    {
        // dd($this);
        $validatedData = $this->validate(
            [
                'company_name' => 'required',
                'business_reg_no' => 'required',
                'business_reg_year' => 'required',
                'company_type' => 'required',
                'sector_type' => 'required',
                'business_desc' => 'required',
                'address_line1' => 'required',
                'address_line2' => 'required',
                'postcode' => 'required',
                'city' => 'required',
                'state' => 'required',
                'office_number' => 'required',
                'fax_number' => 'required',
                'rep_name.*' => 'required',
                'rep_position.*' => 'required',
                'rep_age.*' => 'required',
                'rep_phone.*' => 'required',
                'rep_email.*' => 'required',
            ],
            [
                'company_name.required' => 'Please fill :attribute',
                'business_reg_no.required' => 'Please fill :attribute',
                'business_reg_year.required' => 'Please fill :attribute',
                'company_type.required' => 'Please fill :attribute',
                'sector_type.required' => 'Please fill :attribute',
                'business_desc.required' => 'Please fill :attribute',
                'address_line1.required' => 'Please fill :attribute',
                'address_line2.required' => 'Please fill :attribute',
                'postcode.required' => 'Please fill :attribute',
                'city.required' => 'Please fill :attribute',
                'state.required' => 'Please fill :attribute',
                'office_number.required' => 'Please fill :attribute',
                'fax_number.required' => 'Please fill :attribute',
                'rep_name.required' => 'Please fill :attribute',
                'rep_position.required' => 'Please fill :attribute',
                'rep_age.required' => 'Please fill :attribute',
                'rep_phone.required' => 'Please fill :attribute',
                'rep_email.required' => 'Please fill :attribute',

            ],
            [
                'company_name' => 'company name',
                'business_reg_no' => 'business registration number',
                'business_reg_year' => 'business registration year',
                'company_type' => 'company type',
                'sector_type' => 'sector type',
                'business_desc' => 'description',
                'address_line1' => 'address 1',
                'address_line2' => 'address 2',
                'postcode' => 'postcode',
                'city' => 'city',
                'state' => 'state',
                'office_number' => 'office number',
                'rep_name' => 'representative name',
                'rep_position' => 'representative position',
                'rep_age' => 'representative age',
                'rep_phone' => 'representative phone',
                'rep_email' => 'representative email',
            ]
        );

        if ($this->application->id) {

            $this->application->update([

                'company_name' => $this->company_name,
                'business_reg_no' => $this->business_reg_no,
                'business_reg_year' => $this->business_reg_year,
                'company_type' => $this->company_type,
                'sector_type' => $this->sector_type,
                'business_desc' => $this->business_desc,
                'address_line1' => $this->address_line1,
                'address_line2' => $this->address_line2,
                'postcode' => $this->postcode,
                'city' => $this->city,
                'state' => $this->state,
                'office_number' => $this->office_number,
                'fax_number' => $this->fax_number,
            ]);

            // $representative = Representative::where('application_id', $this->application->id)
            //     ->get();
            foreach ($this->rep_position as $key => $file) {
                if($key == 0){
                    $rep_as = 'founder';
                }else{
                    $rep_as = 'co-founder';
                }
                $rep1 = Representative::updateOrCreate(
                    [
                        'application_id' =>  $this->application->id,
                        'rep_as' => $rep_as,
                    ],
                    [
                        'rep_name' => $this->rep_name[$key],
                        'rep_position' => $this->rep_position[$key],
                        'rep_age' => $this->rep_age[$key],
                        'rep_phone' => $this->rep_phone[$key],
                        'rep_email' => $this->rep_email[$key],
                        'rep_as' => $rep_as,

                    ]
                );
            }
        }
        $statusInsert = ApplicationStatus::create([
            'application_id' => $this->application->id,
            'status_id' => 'AS01',
            'created_by' => Auth::user()->id,
        ]);
        $this->dispatchBrowserEvent('showModal', ['message' => "Data updated"]);
    }

    
}
