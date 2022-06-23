<?php

namespace App\Http\Livewire;

use App\Models\ApplicationStatus;
use App\Models\AssistanceBusinessIssue;
use App\Models\AssistanceLeadershipIssue;
use App\Models\FormChecklist;
use App\Models\Parameter;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Validation\Rule;

use function PHPUnit\Framework\isEmpty;

class ApplicationFormAssistance extends Component
{
    public $application;
    public $issue = [];
    public $issue_priority = [];
    public $issue_desc = [];

    public $checkbox = [];

    // 'issue',
    //     'issue_priority',
    //     'issue_desc',


    public function mount($application)
    {
        // dd($application);
        $this->application = $application;
        $no_of_business_issue = count($application->business_issue);
        $no_of_leadership_issue = count($application->leadership_issue);

        for ($i = 1; $i <= 3; $i++) {
            array_push($this->issue_priority, $i);
        }

        if ($no_of_business_issue > 0) {
            foreach ($application->business_issue as $rep) {
                $this->issue[] = $rep['issue'];
                $this->issue_priority[] = $rep['issue_priority'];
                $this->issue_desc[] = $rep['issue_desc'];
            }
        }

        $leadership_issue = Parameter::where('parameter_name', 'assistance_leadership_issues')
            ->orderBy('type_id')
            ->get();

        if ($no_of_leadership_issue > 0) {
            // foreach ($application->leadership_issue as $key => $val) {
            //     $this->checkbox[$val['issue']] = $val['issue'];
            // }

            foreach ($leadership_issue as $key => $value) {
                foreach ($application->leadership_issue as $key2 => $val) {
                    if ($value['type_id'] == $val['issue']) {
                        $this->checkbox[$key] = $val['issue'];
                    }
                }
            }
        }
    }

    public function render()
    {
        return view('livewire.application-form-assistance');
    }

    public function update_issue()
    {
        // dd($this);
        // dd($this->shareholder_percentage);
        $c = FormChecklist::where([
            ['tab_name', '=', 'Assistance'],
            ['tab_status', '=', 1]
        ])->count();

        // dd($c);

        if ($c < 2) {
            // dd('here');
        } else {
            $checklist = FormChecklist::updateOrCreate(
                [
                    'application_id' =>  $this->application->id,
                    'tab_name' => 'Assistance',
                ],
                [
                    'application_id' => $this->application->id,
                    'tab_name' => 'Assistance',
                    'tab_status' => 0,
                ]
            );
        }

        $validatedData = $this->validate(
            [
                // 'issue'=> 'array',
                'issue.0' => ['required', 'string', Rule::notIn(['Please Choose'])],
                'issue.1' => ['required', 'string', Rule::notIn(['Please Choose'])],
                'issue.2' => ['required', 'string', Rule::notIn(['Please Choose'])],
                'issue_priority.0' => 'required|numeric',
                'issue_priority.1' => 'required|numeric',
                'issue_priority.2' => 'required|numeric',
                'issue_desc.0' => '',
                'issue_desc.1' => '',
                'issue_desc.2' => '',
                // 'issue.*' => ['required','string', Rule::notIn(['Please Choose'])],
                // 'issue_priority.*' => 'required|numeric',
                // 'issue_desc.*' => 'required', 
                'checkbox.*' => 'required',

            ],
            [
                // 'issue.0.required','issue.0.not_in' => 'Please fill :attribute',
                'issue.0.required' => 'Please fill :attribute',
                'issue.0.not_in' => 'Please fill :attribute',
                'issue_priority.0.required' => 'Please fill :attribute',
                'issue_desc.0.required' => 'Please fill :attribute',
                'issue.1.required' => 'Please fill :attribute',
                'issue.1.not_in' => 'Please fill :attribute',
                'issue_priority.1.required' => 'Please fill :attribute',
                'issue_desc.1.required' => 'Please fill :attribute',
                'issue.2.required' => 'Please fill :attribute',
                'issue.2.not_in' => 'Please fill :attribute',
                'issue_priority.2.required' => 'Please fill :attribute',
                'issue_desc.2.required' => 'Please fill :attribute',
                'checkbox.*.required' => 'Please choose at least one issue',
            ],
            [
                'issue.0' => 'issue',
                'issue_priority.0' => 'issue priority',
                'issue_desc.0' => 'issue description',
                'issue.1' => 'issue',
                'issue_priority.1' => 'issue priority',
                'issue_desc.1' => 'issue description',
                'issue.2' => 'issue',
                'issue_priority.2' => 'issue priority',
                'issue_desc.2' => 'issue description',

                'checkbox.*' => 'leadership issue',

            ]
        );

        // dd($validatedData);

        foreach ($this->issue as $key => $file) {

            if (count($this->issue_desc) == 0) {
                $v = '';
            } else {
                $v = $this->issue_desc[$key];
            }

            // dd($v);
            $issue_business = AssistanceBusinessIssue::updateOrCreate(
                [
                    'application_id' =>  $this->application->id,
                    'issue_priority' => $this->issue_priority[$key],
                ],
                [
                    'issue' => $this->issue[$key],
                    'issue_priority' => $this->issue_priority[$key],
                    'issue_desc' => $v,

                ]
            );
        }

        AssistanceLeadershipIssue::where('application_id', $this->application->id)
            ->delete();
        // dd();
        foreach ($this->checkbox as $key => $file) {
            // dd($this->checkbox);
            if (!count($this->checkbox) > 0) {
                $v = '';

                // dd('empty');
                break;
            } else {
                $v = $this->checkbox[$key];
                if ($v == false) {
                    continue;
                }
            }
            $issue_leadership = AssistanceLeadershipIssue::updateOrCreate(
                [
                    'application_id' =>  $this->application->id,
                    'issue' => $v,
                ],
                [
                    'issue' => $v,


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
                'tab_name' => 'Assistance',
            ],
            [
                'application_id' => $this->application->id,
                'tab_name' => 'Assistance',
                'tab_status' => 1,
            ]
        );

        $this->dispatchBrowserEvent('showModal', ['message' => "Data updated"]);
    }
}
