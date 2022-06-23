<?php

namespace App\Http\Livewire;

use App\Models\ApplicationStatus;
use App\Models\Interview;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class AdminReviewStageScoredvideo extends Component
{
    protected $listeners = ['selectforinterview', 'rejectbeforeinterview'];
    public $application;
    public $date_interview;
    public $application_current_status;

    public function mount($application)
    {
        // dd(0);
        $this->application = $application;
        $this->application_current_status = $this->application->currentStatus->status_id;
    }

    public function render()
    {
        return view('livewire.admin-review-stage-scoredvideo');
    }

    public function selectforinterview()
    {
        // dd($this);
        $validatedData = $this->validate(
            [
                'date_interview' => 'required|date',

            ],
            [

                'date_interview.required' => 'Please fill :attribute',
                'date_interview.date' => 'Please insert date value in :attribute',


            ],
            [
                'date_interview' => 'date interview',


            ]
        );

        $statusInsert = ApplicationStatus::create([
            'application_id' => $this->application->id,
            'status_id' => 'AS07',
            'created_by' => Auth::user()->id,
        ]);

        $tablestatusID = $statusInsert->id;

        Interview::create([
            'application_id' => $this->application->id,
            'application_status_id' => $tablestatusID,
            'interview_date' => $this->date_interview,


        ]);

        f_notifyApplicant($this->application->id, 'AS07', $this->date_interview);

        $this->emit('selectforinterview_main');
    }

    public function rejectbeforeinterview()
    {
        $statusInsert = ApplicationStatus::create([
            'application_id' => $this->application->id,
            'status_id' => 'AS08',
            'created_by' => Auth::user()->id,
        ]);

        $this->emit('rejectbeforeinterview_main');
    }
}
