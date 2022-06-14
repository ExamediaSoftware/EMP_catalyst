<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\ApplicationStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Session;
       


class ApplicationController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $applications = Application::where(
            'created_by',
            '=',
            $user->id
        );
        return view('pages.list-application');

    }

     public function store(Request $request)
    {
        $user = Auth::user();
        $application = Application::create(
            [
                'user_id' => $user->id,

            ]
        );
        return redirect()->route('application.edit', compact('application'));
        // return view('pages.application', compact('application'));
    }

    public function edit(Application $application)
    {
        return view('pages.application', compact('application'));
    }

    public function destroy($applicationID)
    {
        $status_delete = Application::find($applicationID)->status()->delete();
        $financial_delete = Application::find($applicationID)->financial()->delete();
        $result = Application::destroy($applicationID);
        return redirect()->back()->with('success', 'Successfully delete application');   
    }
}
