<?php

namespace App\Http\Livewire;

use App\Models\Application;
use App\Models\ApplicationStatus;
use App\Models\Interview;
use App\Models\VideoScore;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class AdminReviewApplication extends Component
{
    public $application;
    public $ownership = [];
    public $no = 1;

    public $statusComponent;

    public $bus_issue = [];

    public $string_document = [
        'Registration Certificate',
        "Owner's IC",
        'Financials Statement 2020',
        'Financials Statement 2021',
        'EPF Contribution Statement'
    ];

    public $string_path = [];

    public $business_reg_cert_path;
    public $owner_ic_file_path;
    public $fin_state_2020_path;
    public $fin_state_2021_path;
    public $epf_or_payslip_path;
    public $video_path;
    public $automaticScore = array();
    public $automaticTotalScore;
    public $videoScore;
    public $videoTotalScore;

    protected $listeners = [
        'submitreview', 'submitquery_main', 'submitvideoscore_main', 'selectforinterview_main',
        'rejectbeforeinterview_main', 'scoreinterview_main', 'successfullcandidate_main', 
        'rejectafterscoreinterview_main','verify_main'
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
        $this->bus_issue = $this->application->business_issue->sortBy('issue_priority');
        $this->leadership_issue = $this->application->leadership_issue;
        // dd($this->leadership_issue );

        $media_businessRegCert = Get_Media($this->application->id, 'business registration certificate');
        $media_IcCert = Get_Media($this->application->id, 'identification card certificate');
        $media_FinState2020 = Get_Media($this->application->id, 'financial statement 2020');
        $media_FinState2021 = Get_Media($this->application->id, 'financial statement 2021');
        $media_EpfState = Get_Media($this->application->id, 'epf/payslip');

        $this->string_path[] = $media_businessRegCert->media_path ?? NULL;
        $this->string_path[] = $media_IcCert->media_path ?? NULL;
        $this->string_path[] = $media_FinState2020->media_path ?? NULL;
        $this->string_path[] = $media_FinState2021->media_path ?? NULL;
        $this->string_path[] = $media_EpfState->media_path ?? NULL;

        $media_InterviewVid = Get_Media($this->application->id, 'interview video');

        $this->video_path = $media_InterviewVid->media_path ?? NULL;

        $this->automaticScore = Get_AutomaticScore($applicationid,0);
        $this->automaticTotalScore = Get_AutomaticScore($applicationid,1);
        // $this->videoScore = VideoScore::where('application_id','=', $applicationid)->latest()->first()->video_score;
        $this->interviewScore = Interview::where('application_id','=', $applicationid)->latest()->first()->interview_score;
        $this->videoScore = Get_VideoScore($applicationid,0);
        $this->videoTotalScore = Get_VideoScore($applicationid,1);

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
        
        $statusInsert = ApplicationStatus::create([
            'application_id' => $this->application->id,
            'status_id' => 'AS04',
            'created_by' => Auth::user()->id,
        ]);

        f_notifyAdmin($this->application->id, 'AS04');

        $this->statusComponent = Get_ComponentStage($this->application->id);


        $this->dispatchBrowserEvent('closeModalReview', ['message' => "Data updated"]);
    }

    public function submitquery_main()
    {
        $this->no++;
        $this->statusComponent = Get_ComponentStage($this->application->id);

        $this->dispatchBrowserEvent('closeModalReview', ['message' => "Data updated"]);
    }

    public function submitvideoscore_main()
    {
        $this->no++;
        // $this->statusComponent = 'admin-review-stage-scoredvideo';
        $this->statusComponent = Get_ComponentStage($this->application->id);

        $this->dispatchBrowserEvent('showModal', ['message' => 'Data updated']);
    }



    public function selectforinterview_main()
    {
        $this->no++;
        // $this->statusComponent = 'admin-review-stage-selectedinterview';
        $this->statusComponent = Get_ComponentStage($this->application->id);

        $this->dispatchBrowserEvent('showModal', ['message' => 'Data updated']);
    }



    public function scoreinterview_main()
    {
        $this->no++;
        $this->statusComponent = Get_ComponentStage($this->application->id);

        $this->dispatchBrowserEvent('showModal', ['message' => 'Data updated']);
    }

    public function successfullcandidate_main()
    {
        $this->no++;
        $this->statusComponent = Get_ComponentStage($this->application->id);

        $this->dispatchBrowserEvent('showModal', ['message' => 'Data updated']);
    }
    public function verify_main()
    {
        $this->no++;
        $this->statusComponent = Get_ComponentStage($this->application->id);

        $this->dispatchBrowserEvent('showModal', ['message' => 'Data updated']);
    }
    public function rejectbeforeinterview_main()
    {
        $this->no++;
        // $this->statusComponent = 'admin-review-stage-rejectbeforeinterview';

        $this->statusComponent = Get_ComponentStage($this->application->id);

        $this->dispatchBrowserEvent('showModal', ['message' => 'Data updated']);
    }

    public function rejectafterscoreinterview_main()
    {
        $this->no++;
        // $this->statusComponent = 'admin-review-stage-rejectbeforeinterview';

        $this->statusComponent = Get_ComponentStage($this->application->id);

        $this->dispatchBrowserEvent('showModal', ['message' => 'Data updated']);
    }
}
