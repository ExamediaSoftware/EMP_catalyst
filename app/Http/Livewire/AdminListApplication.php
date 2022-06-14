<?php

namespace App\Http\Livewire;

use App\Models\Application;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class AdminListApplication extends Component
{
    public $applications;

    public function render()
    {

        // $this->applications = Application::all();

        
        $user = Auth::user();

        if ($user->hasAnyRole('Super-Admin')) {
            // dd('Super') ;
            $this->applications = Application::all();
        }else{

            $this->applications = Application::whereHas(
                'currentStatus',  function ($query) {
                    $query->where('status_id', '<>', 'AS01');
                }
            )->get();
        }
        // dd($this->applications);

        return view('livewire.admin-list-application');
    }
}
