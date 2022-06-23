<?php

namespace App\Http\Livewire;

use App\Models\ApplicationStatus;
use App\Models\FormChecklist;
use App\Models\Ownership;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Validation\Rule;

class ApplicationFormOwnership extends Component
{
    public $application;
    public $ownership_count;
    public $shareholder_name = [];
    public $shareholder_percentage = [];
    public $shareholder_race = [];
    public $shareholder_religion = [];
    public $shareholder_gender = [];
    public $shareholder_age = [];
    public $inputs = [];

    public function mount($application)
    {
        // dd($application);
        $this->application = $application;
        $no_of_current_ownership = count($application->ownership);
        $this->ownership_count = $no_of_current_ownership;

        for ($i = 3; $i <= $no_of_current_ownership; $i++) {
            array_push($this->inputs, $i);
        }

        if ($no_of_current_ownership > 0) {
            foreach ($application->ownership as $rep) {
                $this->shareholder_name[] = $rep['shareholder_name'];
                $this->shareholder_percentage[] = $rep['shareholder_percentage'];
                $this->shareholder_race[] = $rep['shareholder_race'];
                $this->shareholder_religion[] = $rep['shareholder_religion'];
                $this->shareholder_gender[] = $rep['shareholder_gender'];
                $this->shareholder_age[] = $rep['shareholder_age'];
            }
        }
    }


    public function render()
    {
        return view('livewire.application-form-ownership');
    }

    public function update_ownership()
    {
        // dd($this);
        // dd($this->shareholder_percentage);

        // shareholder_name
        // shareholder_percentage
        // shareholder_race
        // shareholder_religion
        // shareholder_gender
        // shareholder_age
        $c = FormChecklist::where([
            ['tab_name', '=', 'Ownership'],
            ['tab_status', '=', 1]
        ])->count();

        // dd($c);

        if ($c < 2) {
            // dd('here');
        } else {
            $checklist = FormChecklist::updateOrCreate(
                [
                    'application_id' =>  $this->application->id,
                    'tab_name' => 'Ownership',
                ],
                [
                    'application_id' => $this->application->id,
                    'tab_name' => 'Ownership',
                    'tab_status' => 0,
                ]
            );
        }




        $validatedData = $this->validate(
            [
                'shareholder_name.*' => 'required|string',
                'shareholder_percentage.*' => 'required|numeric',
                'shareholder_race.*' => ['required', 'string', Rule::notIn(['Please Choose'])],
                'shareholder_religion.*' => ['required', 'string', Rule::notIn(['Please Choose'])],
                'shareholder_gender.*' => ['required', 'string', Rule::notIn(['Please Choose'])],
                'shareholder_age.*' => ['required', 'string', Rule::notIn(['Please Choose'])],
                // 'shareholder_name' => 'required|numeric',
                // 'shareholder_percentage' => 'required|numeric',
                // 'shareholder_race' => 'required',
                // 'shareholder_religion' => 'required',
                // 'shareholder_gender' => 'required',
                // 'shareholder_age' => 'required',

            ],
            [
                // 'shareholder_name.required' => 'Please fill :attribute',
                // 'shareholder_percentage.required' => 'Please fill :attribute',
                // 'shareholder_percentage.numeric' => 'Please insert numeric value in :attribute',                
                // 'shareholder_race.required' => 'Please fill :attribute',
                // 'shareholder_religion.required' => 'Please fill :attribute',
                // 'shareholder_gender.required' => 'Please fill :attribute',
                // 'shareholder_age.required' => 'Please fill :attribute',

                'shareholder_name.*.required' => 'Please fill :attribute',
                'shareholder_name.*.numeric' => 'Please insert numeric value in :attribute',
                'shareholder_percentage.*.required' => 'Please fill :attribute',
                'shareholder_percentage.*.numeric' => 'Please insert numeric value in :attribute',
                'shareholder_race.*.required', 'shareholder_race.*.not_in' => 'Please fill :attribute',
                'shareholder_religion.*.required', 'shareholder_religion.*.not_in' => 'Please fill :attribute',
                'shareholder_religion.*.numeric' => 'Please insert numeric value in :attribute',
                'shareholder_gender.*.required', 'shareholder_gender.*.not_in' => 'Please fill :attribute',
                'shareholder_gender.*.numeric' => 'Please insert numeric value in :attribute',
                'shareholder_age.*.required', 'shareholder_age.*.not_in' => 'Please fill :attribute',
                'shareholder_age.*.numeric' => 'Please insert numeric value in :attribute',


            ],
            [
                'shareholder_name.*' => 'shareholder name',
                'shareholder_percentage.*' => 'shareholder percentage',
                'shareholder_race.*' => 'shareholder race',
                'shareholder_religion.*' => 'shareholder religion',
                'shareholder_gender.*' => 'shareholder gender',
                'shareholder_age.*' => 'shareholder age',

            ]
        );

        // dd($validatedData);

        foreach ($this->shareholder_name as $key => $file) {

            $own = Ownership::updateOrCreate(
                [
                    'application_id' =>  $this->application->id,
                    'shareholder_no' => ($key + 1),
                ],
                [
                    'shareholder_name' => $this->shareholder_name[$key],
                    'shareholder_percentage' => $this->shareholder_percentage[$key],
                    'shareholder_race' => $this->shareholder_race[$key],
                    'shareholder_religion' => $this->shareholder_religion[$key],
                    'shareholder_gender' => $this->shareholder_gender[$key],
                    'shareholder_age' => $this->shareholder_age[$key],
                    'shareholder_no' => ($key + 1),
                ]
            );
        }
        $statusInsert = ApplicationStatus::create([
            'application_id' => $this->application->id,
            'status_id' => 'AS01',
            'created_by' => Auth::user()->id,
        ]);

        $checklist = FormChecklist::updateOrCreate(
            [
                'application_id' =>  $this->application->id,
                'tab_name' => 'Ownership',
            ],
            [
                'application_id' => $this->application->id,
                'tab_name' => 'Ownership',
                'tab_status' => 1,
            ]
        );
        $this->dispatchBrowserEvent('showModal', ['message' => "Data updated"]);
    }

    public function add()
    {
        $this->ownership_count++;
        // dd($this->ownership_count);
        array_push($this->inputs, $this->ownership_count);
        // $this->dispatchBrowserEvent('addFields', ['count' => $this->ownership_count]);
    }

    public function remove($i)
    {
        unset($this->inputs[$i]);
    }
}
