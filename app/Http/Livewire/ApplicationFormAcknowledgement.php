<?php

namespace App\Http\Livewire;

use App\Models\Application;
use App\Models\ApplicationStatus;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ApplicationFormAcknowledgement extends Component
{
    public $acknowledgement_checkbox;
    public $application;
    public $array_resubmit_status = ['Queried'];
    public $isResubmitMode = false;


    public function mount($application)
    {
        // dd($application);
        $this->application = $application;
        $this->acknowledgement_checkbox = $application->acknowledgement;
        if (in_array($application->currentStatus->status_id,$this->array_resubmit_status)){
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

        $validatedData = $this->validate(
            [
                'acknowledgement_checkbox' => 'required|in:'.$str,
            ],
            [
                'acknowledgement_checkbox.required' => 'You need to acknowledge by TICK the checkbox to submit',
                'acknowledgement_checkbox.in' => 'You need to acknowledge by TICK the checkbox to submit',
            ],
            [
                'acknowledgement_checkbox' => 'leadership issue',
            ]
        );

        if($this->acknowledgement_checkbox == 0){
            $this->acknowledgement_checkbox ='';
        }else{
            $status ='AS02'; //submit

            if($this->isResubmitMode){
                $status = 'AS13'; //resubmit
            }
            $statusInsert = ApplicationStatus::create([
                'application_id' => $this->application->id,
                'status_id' => $status,
                'created_by' => Auth::user()->id,
            ]);

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
