<?php

namespace App\Http\Livewire;

use App\Models\Notification;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class Notifications extends Component
{
    use WithPagination;

    // protected $paginationTheme = 'bootstrap';
    // public $allnotifications;

    public function mount()
    {
        // $this->refreshList();
    }


    public function render()
    {
        // dd(1);
        return view('livewire.notifications',[
            'allnotification' => Notification::where('user_id', Auth::user()->id)->paginate(10),
        ]);
    }

    // public function refreshList()
    // {
    //     $this->allnotifications = Notification::where('user_id', Auth::user()->id)->get();
        
    //     // dd($this->allnotification);
    // }
}
