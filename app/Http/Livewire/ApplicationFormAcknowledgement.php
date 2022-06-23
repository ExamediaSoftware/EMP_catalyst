<?php

namespace App\Http\Livewire;

use App\Events\NotifyAdmin;
use App\Models\Application;
use App\Models\ApplicationStatus;
use App\Models\FormChecklist;
use App\Models\Notification;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ApplicationFormAcknowledgement extends Component
{
    public $acknowledgement_checkbox;
    public $application;
    public $array_resubmit_status = ['Queried'];
    public $isResubmitMode = false;
    public $error_sini = [];


    public function mount($application)
    {
        // dd($application);
        $this->application = $application;
        $this->acknowledgement_checkbox = $application->acknowledgement;
        if (in_array($application->currentStatus->status_id, $this->array_resubmit_status)) {
            $this->isResubmitMode = true;
        }
    }

    public function render()
    {
        return view('livewire.application-form-acknowledgement');
    }

    public function submitApplication()
    {
        // dd($this);
        $str = "Yes";

        $this->error_sini = [];

        $array_checklist1 = FormChecklist::select('tab_name')->where([
            ['application_id', '=', $this->application->id],
            ['tab_status', '=', 1]
        ])->groupBy('tab_name')->get()->toArray();
        // dd($array_checklist);

        if (count($array_checklist1) < 7) {
            $array_checklist0 = FormChecklist::select('tab_name')->where([
                ['application_id', '=', $this->application->id],
                ['tab_status', '=', 0]
            ])->groupBy('tab_name')->get()->toArray();

            foreach ($array_checklist0 as $key => $value) {
                $this->error_sini[] = $value['tab_name'];
            }

            
            // dd($this->error_sini);
            // return;
            // return  redirect()->back()->withErrors($this->errors);
        }


        $validatedData = $this->validate(
            [
                'acknowledgement_checkbox' => 'required|in:' . $str,
            ],
            [
                'acknowledgement_checkbox.required' => 'You need to acknowledge by TICK the checkbox to submit',
                'acknowledgement_checkbox.in' => 'You need to acknowledge by TICK the checkbox to submit',
            ],
            [
                'acknowledgement_checkbox' => 'leadership issue',
            ]
        );
        // dd('here');
        if ($this->acknowledgement_checkbox == 0) {
            $this->acknowledgement_checkbox = '';
        } else {
            $status = 'AS02'; //submit

            if ($this->isResubmitMode) {
                $status = 'AS13'; //resubmit
            }
            $statusInsert = ApplicationStatus::create([
                'application_id' => $this->application->id,
                'status_id' => $status,
                'created_by' => Auth::user()->id,
            ]);

            f_notifyAdmin($this->application->id, $status);

            // $users_admin =  User::role('Admin')->get();

            // // dd($users_admin);
            // foreach($users_admin as $admin){
                
            //     Notification::create([
            //         'user_id' => $admin->id,
            //         'message' => 'An application with no: AA'. $this->application->id. ' has been submitted',
            //         'isRead' => 0,
            //     ]);
            // }
            // event(new NotifyAdmin('Hai'));

            // dd($statusInsert);
        }

        $app = Application::where('id', $this->application->id)->update(
            [
                'acknowledgement' => $this->acknowledgement_checkbox,
            ]
        );

        $this->dispatchBrowserEvent('showModal', ['message' => 'Data updated']);
    }
}
