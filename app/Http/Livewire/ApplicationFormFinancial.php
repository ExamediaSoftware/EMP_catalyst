<?php

namespace App\Http\Livewire;

use App\Models\ApplicationStatus;
use App\Models\Financial;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ApplicationFormFinancial extends Component
{
    public $application;
    public $financial_year = [];
    public $financial_revenue = [];
    public $financial_expenses = [];

    public function mount($application)
    {
        // dd($application);
        $this->application = $application;

        array_push($this->financial_year, 2021);
        array_push($this->financial_year, 2020);

        if (count($application->financial)) {
            foreach ($application->financial as $rep) {
                $this->financial_year[] = $rep['financial_year'];
                $this->financial_revenue[] = $rep['financial_revenue'];
                $this->financial_expenses[] = $rep['financial_expenses'];
            }
        }
    }

    public function render()
    {
        return view('livewire.application-form-financial');
    }

    public function update_financial()
    {
        // dd($this);
        // dd($this->shareholder_percentage);

        // financial_year
        // financial_revenue
        // financial_expenses

        $validatedData = $this->validate(
            [
                'financial_year.*' => 'required|numeric',
                'financial_revenue.*' => 'required|numeric',
                'financial_expenses.*' => 'required|numeric',

            ],
            [
                // 'shareholder_name.required' => 'Please fill :attribute',
                // 'shareholder_percentage.required' => 'Please fill :attribute',
                // 'shareholder_percentage.numeric' => 'Please insert numeric value in :attribute',                
                // 'shareholder_race.required' => 'Please fill :attribute',
                // 'shareholder_religion.required' => 'Please fill :attribute',
                // 'shareholder_gender.required' => 'Please fill :attribute',
                // 'shareholder_age.required' => 'Please fill :attribute',

                'financial_year.*.required' => 'Please fill :attribute',
                'financial_year.*.numeric' => 'Please insert numeric value in :attribute',
                'financial_revenue.*.required' => 'Please fill :attribute',
                'financial_revenue.*.numeric' => 'Please insert numeric value in :attribute',
                'financial_expenses.*.required' => 'Please fill :attribute',
                'financial_expenses.*.numeric' => 'Please insert numeric value in :attribute',



            ],
            [
                'financial_year.*' => 'year',
                'financial_revenue.*' => 'revenue',
                'financial_expenses.*' => 'expenses',

            ]
        );

        // dd($validatedData);

        foreach ($this->financial_revenue as $key => $file) {

            $own = Financial::updateOrCreate(
                [
                    'application_id' =>  $this->application->id,
                    'financial_year' => $this->financial_year[$key],
                ],
                [
                    'financial_year' => $this->financial_year[$key],
                    'financial_revenue' => $this->financial_revenue[$key],
                    'financial_expenses' => $this->financial_expenses[$key],

                ]
            );
        }

        $statusInsert = ApplicationStatus::create([
            'application_id' => $this->application->id,
            'status_id' => 'AS01',
            'created_by' => Auth::user()->id,
        ]);

        $this->dispatchBrowserEvent('showModal', ['message' => "Data updated"]);
    }
}
