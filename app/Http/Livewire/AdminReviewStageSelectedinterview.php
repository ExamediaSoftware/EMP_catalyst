<?php

namespace App\Http\Livewire;

use App\Models\ApplicationStatus;
use App\Models\Interview;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class AdminReviewStageSelectedinterview extends Component
{

    protected $listeners = ['scoreinterview'];
    public $application;
    public $score_interview;
    public $application_current_status;

    public function mount($application)
    {
        // dd(0);
        $this->application = $application;
        $this->application_current_status = $this->application->currentStatus->status_id;
    }

    public function render()
    {
        return view('livewire.admin-review-stage-selectedinterview');
    }

    public function scoreinterview()
    {
        $validatedData = $this->validate(
            [
                'score_interview' => 'required|numeric',

            ],
            [

                'score_interview.required' => 'Please fill :attribute',
                'score_interview.numeric' => 'Please insert numeric value in :attribute',


            ],
            [
                'score_interview' => 'score interview',


            ]
        );

        $statusInsert = ApplicationStatus::create([
            'application_id' => $this->application->id,
            'status_id' => 'AS09',
            'created_by' => Auth::user()->id,
        ]);

        $tablestatusID = $statusInsert->id;

        Interview::where([
            ["application_id", '=', $this->application->id],
        ])->update([            
            'interview_score' => $this->score_interview,
        ]);

        $this->emit('scoreinterview_main');
    }
}
