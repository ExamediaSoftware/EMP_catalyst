<?php

namespace App\Http\Livewire;

use App\Models\Notification;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ModalNotification extends Component
{
    
    protected $listeners = [
        'notify_modalnotification' => 'notifyMe'
    ];

    public $allnotification;
    public $countMessageNotReadYet;

    public function mount()
    {
        $this->refreshList();
    }

    public function notifyMe()
    {
        $this->refreshList();
    }

    public function render()
    {
        return view('livewire.modal-notification');
    }

    public function refreshList()
    {
        $this->allnotification = Notification::where('user_id', Auth::user()->id)->take(5)->get();
        $this->countMessageNotReadYet = Notification::where([
            ['user_id', '=', Auth::user()->id],
            ['isRead', '=', 0],
        ])->count();
        // dd($this->allnotification);
    }
}
