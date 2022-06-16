<?php

namespace App\Http\Livewire;

use App\Models\Application;
use App\Models\ApplicationStatus;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class AdminReviewStageScoredinterview extends Component
{
    protected $listeners = ['successfullcandidate','rejectafterscoreinterview'];

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
        return view('livewire.admin-review-stage-scoredinterview');
    }

    public function successfullcandidate()
    {
        $statusInsert = ApplicationStatus::create([
            'application_id' => $this->application->id,
            'status_id' => 'AS10',
            'created_by' => Auth::user()->id,
        ]);

        $this->emitUp('successfullcandidate_main');
    }
    public function rejectafterscoreinterview()
    {
        $statusInsert = ApplicationStatus::create([
            'application_id' => $this->application->id,
            'status_id' => 'AS11',
            'created_by' => Auth::user()->id,
        ]);

        $this->emitUp('rejectafterscoreinterview_main');
    }


    
}
