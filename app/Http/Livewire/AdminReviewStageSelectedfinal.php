<?php

namespace App\Http\Livewire;

use App\Models\ApplicationStatus;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class AdminReviewStageSelectedfinal extends Component
{
    protected $listeners = ['verify'];

    public $application;
    public $application_current_status;

    public function mount($application)
    {
        // dd(0);
        $this->application = $application;
        $this->application_current_status = $this->application->currentStatus->status_id;
    }

    public function render()
    {
        return view('livewire.admin-review-stage-selectedfinal');
    }

    public function verify()
    {
        $statusInsert = ApplicationStatus::create([
            'application_id' => $this->application->id,
            'status_id' => 'AS12',
            'created_by' => Auth::user()->id,
        ]);


        $this->emitUp('verify_main');
    }
}
