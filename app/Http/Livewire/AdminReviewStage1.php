<?php

namespace App\Http\Livewire;

use App\Models\ApplicationStatus;
use App\Models\SectionComment;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class AdminReviewStage1 extends Component
{
    public $application;
    public $array_resubmit_status = ['Resubmit'];
    public $UI_status = 'Submitted';
    public $UI_status_desc = 'This is a new application that has been submitted';
    public $isResubmitMode = false;

    public $checkbox = [];
    public $comment;

    protected $listeners = ['submitquery'];

    public function mount($application)
    {
        // dd(0);
        $this->application = $application;
        if (in_array($application->currentStatus->status_id,$this->array_resubmit_status)){
            $this->isResubmitMode = true;
            $this->UI_status = "Resubmit";
            $this->UI_status_desc = "This application that has been resubmit by applicant";
        }
    }

    public function loadData()
    {
        
    }

    public function render()
    {
        // dd($this->application);
        return view('livewire.admin-review-stage1');
    }

    public function submitquery()
    {
        // dd($this);
        $statusInsert = ApplicationStatus::create([
            'application_id' => $this->application->id,
            'status_id' => 'AS03',
            'created_by' => Auth::user()->id,
        ]);

        $tablestatusID = $statusInsert->id;
        // dd($tablestatusID);
        $section = ['General', 'Ownership', 'Financial', 'Employess', 'Assistance', 'Document', 'Video'];
        // dd($section);
        foreach ($this->checkbox as $key => $value) {
            if ($value == true) {

                SectionComment::create([
                    'application_id' => $this->application->id,
                    'application_status_id' => $tablestatusID,
                    'section' => $section[$key],
                    'comment' => $this->comment,
                    
                ]);
            }
        }

        $this->emitUp('submitquery_main');
    }
}
