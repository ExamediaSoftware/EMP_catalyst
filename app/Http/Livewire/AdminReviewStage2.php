<?php

namespace App\Http\Livewire;

use App\Models\ApplicationStatus;
use App\Models\VideoScore;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class AdminReviewStage2 extends Component
{
    protected $listeners = ['submitvideoscore'];
    public $application;
    public $videoScore;
    public $application_current_status;

    public function mount($application)
    {
        // dd(0);
        $this->application = $application;
        $this->application_current_status = $this->application->currentStatus->status_id;
    }

    public function render()
    {
        return view('livewire.admin-review-stage2');
    }

    public function submitvideoscore()
    {
        // dd($this);
        // dd($this->application);

        $validatedData = $this->validate(
            [
                'videoScore' => 'required|numeric',

            ],
            [

                'videoScore.required' => 'Please fill :attribute',
                'videoScore.numeric' => 'Please insert numeric value in :attribute',


            ],
            [
                'videoScore' => 'video score',


            ]
        );

        // dd($this->videoScore);

        if ($this->application->currentStatus->status_id == 'Reviewed') { //first-time to score
            $statusInsert = ApplicationStatus::create([
                'application_id' => $this->application->id,
                'status_id' => 'AS06',
                'created_by' => Auth::user()->id,
            ]);

            $tablestatusID = $statusInsert->id;
            $count = 0;
        }
        // dd($this->application->currentStatus->status_id);

        if ($this->application->currentStatus->status_id == 'Scored - Incomplete') { //2nd or 3rd
            $tablestatusID = $this->application->currentStatus->id;

            $count = VideoScore::where([
                ['application_id', '=', $this->application->id],
                ['application_status_id', '=', $tablestatusID]
            ])->count();
        }

        // dd($count);

        if ($count < 3) {

            VideoScore::create([
                'application_id' => $this->application->id,
                'application_status_id' => $tablestatusID,
                'video_score' => $this->videoScore,
                'user_id' => Auth::user()->id,

            ]);
        }

        $count = VideoScore::where([
            ['application_id', '=', $this->application->id],
            ['application_status_id', '=', $tablestatusID]
        ])->count();

        // dd($count);

        if ($count == 3) {
            $statusInsert = ApplicationStatus::create([
                'application_id' => $this->application->id,
                'status_id' => 'AS05',
                'created_by' => Auth::user()->id,
            ]);
        }

        $this->emit('submitvideoscore_main');
    }
}
