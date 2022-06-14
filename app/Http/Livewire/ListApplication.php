<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ListApplication extends Component
{
    public function render()
    {
        $user = Auth::user();
        $application = Application::where(
            'user_id',
            '=',
            $user->id
        )->get();
        // dd($application[0]->currentStatus[0]->status_id);
        
        return view('livewire.list-application', compact('application'));
    }
}
