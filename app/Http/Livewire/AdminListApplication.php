<?php

namespace App\Http\Livewire;

use App\Models\Application;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class AdminListApplication extends Component
{
    public $applications;

    protected $listeners = ['sendnotification_to_successfull'];

    public function render()
    {

        // $this->applications = Application::all();


        $user = Auth::user();

        if ($user->hasAnyRole('Super-Admin')) {
            // dd('Super') ;
            $this->applications = Application::all();
        } else {

            $this->applications = Application::whereHas(
                'currentStatus',
                function ($query) {
                    $query->where('status_id', '<>', 'AS01');
                }
            )->get();
        }
        // dd($this->applications);

        return view('livewire.admin-list-application');
    }

    public function sendnotification_to_successfull()
    {
        //    dd( Application::find(3) );
        $status = 'AS12';
        // $applications = Application::with(['currentStatus' => function($q) use($status) {
        //     $q->where('status_id', '=', $status); // '=' is optional
        // }])->get();

        // $applications = Application::with(['currentStatus'])
        //     ->whereHas('currentStatus', function ($q) use ($status) {
        //         // Query the name field in status table
        //         $q->where('status_id', '=', $status); // '=' is optional
        //     })
        //     ->get();

        $applications = Application::with('currentStatus')
        ->whereHas('currentStatus', function ($query) use ($status) 
        {
            // $query->where('status_id', $status);
            $query->whereRaw('Created_at IN (select MAX(Created_at) FROM application_statuses GROUP BY application_id)')
            ->where('status_id', $status);
        }
        )->get();
        // dd($applications);

        foreach($applications as $app){
            f_notifyApplicant($app->id, $status);
        }
    }
}
