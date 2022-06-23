<?php

namespace App\Http\Livewire;

use App\Models\Notification;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class FloatNotification extends Component
{
    public $message = "New message appear here";
    // public $allnotification;
    // public $countMessageNotReadYet;

    protected $listeners = [
        'echo:notification,NotifyAdmin' => 'notify',
        'echo:notification,NotifyApplicant' => 'notify2'
    ];
    
    // public function getListeners()
    // {
    //     return [
    //         "echo:notification.{$this->message},NotifyAdmin" => 'notify',
    //     ];
    // }

    public function notify($e)
    {
        // $this->message = ($e['message']);
        $user = Auth::user();
        if ($user->hasAnyRole('Super-Admin', 'Admin')) {
            $this->dispatchBrowserEvent('orderCompleted');
            $this->message = 'You have new notification';
            $this->emit('notify_modalnotification');
        }
    }

    public function notify2($e)
    {
        $applicantID = ($e['applicantID']);
        $user = Auth::user();
        if ($user->id == $applicantID) {
            $this->dispatchBrowserEvent('orderCompleted');
            $this->message = 'You have new notification';
            $this->emit('notify_modalnotification');
        }
    }

    public function mount()
    {
        // $this->allnotification = Notification::where('user_id', Auth::user()->id);
        // $this->countMessageNotReadYet = Notification::where([
        //     ['user_id', '=', Auth::user()->id],
        //     ['isRead', '=', 0],
        // ]);
    }

    public function render()
    {
        return view('livewire.float-notification');
    }
}
