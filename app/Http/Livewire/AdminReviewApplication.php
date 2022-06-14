<?php

namespace App\Http\Livewire;

use App\Models\Application;
use App\Models\ApplicationStatus;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class AdminReviewApplication extends Component
{
    public $application;
    public $ownership = [];
    public $no = 1;

    public $statusComponent;

    protected $listeners = [
        'submitreview', 'submitquery_main', 'submitvideoscore_main', 'selectforinterview_main',
        'rejectbeforeinterview_main',
        'scoreinterview_main', 'successfullcandidate_main', 'verify_main'
    ];

    public function mount($applicationid)
    {
        $this->application = Application::find($applicationid);
        // dd($this->application->currentStatus->status_id);

        $this->ownership = $this->application->ownership ?? NULL;
        // dd($this->ownership);
        // if ($this->application->currentStatus->status_id == 'Submitted') {
        //     $this->statusComponent = 'admin-review-stage1';
        // }
        // dd($this->application->currentStatus->status_id);

        // $this->statusComponent = 'admin-review-stage1';

        $this->statusComponent = Get_ComponentStage($this->application->id);
    }

    public function render()
    {
        // return view('livewire.admin-review-application');
        // dd('here');
        return view('livewire.admin-review-application', [
            'component' => $this->statusComponent,
            // key is required to force a refresh of the container component
            'key' => random_int(-999, 999),
        ]);
    }

    public function submitreview()
    {
        $this->no++;
        $this->statusComponent = 'admin-review-stage2';

        $statusInsert = ApplicationStatus::create([
            'application_id' => $this->application->id,
            'status_id' => 'AS04',
            'created_by' => Auth::user()->id,
        ]);

        // $this->dispatchBrowserEvent('closeModalReview', ['message' => "Data updated"]);
    }

    public function submitquery_main()
    {
        $this->no++;
        $this->statusComponent = 'admin-review-stage-queried';

        $this->dispatchBrowserEvent('closeModalReview', ['message' => "Data updated"]);
    }

    public function submitvideoscore_main()
    {
        $this->no++;
        $this->statusComponent = 'admin-review-stage-scoredvideo';

        $this->dispatchBrowserEvent('closeModalReview', ['message' => "Data updated"]);
    }



    public function selectforinterview_main()
    {
        $this->no++;
        $this->statusComponent = 'admin-review-stage-selectedinterview';

        // $this->dispatchBrowserEvent('closeModalReview', ['message' => "Data updated"]);
    }



    public function scoreinterview_main()
    {
        $this->no++;
        $this->statusComponent = 'admin-review-stage-scoredinterview';

        // $this->dispatchBrowserEvent('closeModalReview', ['message' => "Data updated"]);
    }

    public function successfullcandidate_main()
    {
        $this->no++;
        $this->statusComponent = 'admin-review-stage-selectedfinal';

        // $this->dispatchBrowserEvent('closeModalReview', ['message' => "Data updated"]);
    }
    public function verify_main()
    {
        $this->no++;
        $this->statusComponent = 'admin-review-stage-successful';

        // $this->dispatchBrowserEvent('closeModalReview', ['message' => "Data updated"]);
    }
    public function rejectbeforeinterview_main()
    {
        $this->no++;
        $this->statusComponent = 'admin-review-stage-rejectbeforeinterview';

        // $this->dispatchBrowserEvent('closeModalReview', ['message' => "Data updated"]);
    }
}
