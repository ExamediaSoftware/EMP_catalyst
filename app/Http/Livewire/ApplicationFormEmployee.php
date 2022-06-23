<?php

namespace App\Http\Livewire;

use App\Models\ApplicationStatus;
use App\Models\Employee;
use App\Models\FormChecklist;
use FFMpeg\Format\FormatInterface;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ApplicationFormEmployee extends Component
{

    public $application_id;
    public $emp_type = [];
    public $emp_total_no = [];

    public function mount($application)
    {
        // dd($application);
        $this->application = $application;

        array_push($this->emp_type, 'Full-time');
        array_push($this->emp_type, 'Part-time');

        if (count($application->employee)) {
            foreach ($application->employee as $rep) {
                $this->emp_type[] = $rep['emp_type'];
                $this->emp_total_no[] = $rep['emp_total_no'];
            }
        }
    }

    public function render()
    {
        return view('livewire.application-form-employee');
    }

    public function update_employee()
    {
        // dd($this);
        // dd($this->shareholder_percentage);

        // financial_year
        // financial_revenue
        // financial_expenses
        $c = FormChecklist::where([
            ['tab_name', '=', 'Employee'],
            ['tab_status', '=', 1]
        ])->count();

        // dd($c);

        if ($c < 2) {
            // dd('here');
        } else {
            $checklist = FormChecklist::updateOrCreate(
                [
                    'application_id' =>  $this->application->id,
                    'tab_name' => 'Employee',
                ],
                [
                    'application_id' => $this->application->id,
                    'tab_name' => 'Employee',
                    'tab_status' => 0,
                ]
            );
        }

        $validatedData = $this->validate(
            [
                'emp_type.*' => 'required',
                'emp_total_no.*' => 'required|numeric',

            ],
            [
                // 'shareholder_name.required' => 'Please fill :attribute',
                // 'shareholder_percentage.required' => 'Please fill :attribute',
                // 'shareholder_percentage.numeric' => 'Please insert numeric value in :attribute',                
                // 'shareholder_race.required' => 'Please fill :attribute',
                // 'shareholder_religion.required' => 'Please fill :attribute',
                // 'shareholder_gender.required' => 'Please fill :attribute',
                // 'shareholder_age.required' => 'Please fill :attribute',

                'emp_type.*.required' => 'Please fill :attribute',
                'emp_type.*.numeric' => 'Please insert numeric value in :attribute',
                'emp_total_no.*.required' => 'Please fill :attribute',
                'emp_total_no.*.numeric' => 'Please insert numeric value in :attribute',

            ],
            [
                'emp_type.*' => 'employee type',
                'emp_total_no.*' => 'employee total number',

            ]
        );

        // dd($validatedData);

        foreach ($this->emp_total_no as $key => $file) {

            $own = Employee::updateOrCreate(
                [
                    'application_id' =>  $this->application->id,
                    'emp_type' => $this->emp_type[$key],
                ],
                [
                    'emp_type' => $this->emp_type[$key],
                    'emp_total_no' => $this->emp_total_no[$key],

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
                'tab_name' => 'Employee',
            ],
            [
                'application_id' => $this->application->id,
                'tab_name' => 'Employee',
                'tab_status' => 1,
            ]
        );

        $this->dispatchBrowserEvent('showModal', ['message' => "Data updated"]);
    }
}
