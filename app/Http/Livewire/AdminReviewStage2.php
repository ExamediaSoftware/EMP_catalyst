<?php

namespace App\Http\Livewire;

use App\Models\ApplicationStatus;
use App\Models\VideoScore;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class AdminReviewStage2 extends Component
{
    protected $listeners = ['submitvideoscore'];
    public $videoScore;

    public function mount($application)
    {
        // dd(0);
        $this->application = $application;
        
    }

    public function render()
    {
        return view('livewire.admin-review-stage2');
    }

    public function submitvideoscore()
    {
        dd($this);
        $statusInsert = ApplicationStatus::create([
            'application_id' => $this->application->id,
            'status_id' => 'AS06',
            'created_by' => Auth::user()->id,
        ]);

        $tablestatusID = $statusInsert->id;

        VideoScore::create([
            'application_id' => $this->application->id,
            'application_status_id' => $tablestatusID,
            'video_score' => $this->videoScore,
            'user_id' => Auth::user()->id,
            
        ]);

        $this->emit('submitvideoscore_main');
    }
}
