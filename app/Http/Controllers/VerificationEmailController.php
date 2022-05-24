<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Auth\Events\Verified;

class VerificationEmailController extends Controller
{
    public function verify(Request $request)
    {
        $user = User::findOrFail($request->id);
        // dd($user);    
        if (!hash_equals((string) $request->route('hash'), sha1($user->getEmailForVerification()))) {
            return '';
        }
    
        if ($user->markEmailAsVerified())
            event(new Verified($user));
    
        $message = __('Your email has been verified.');

        return redirect('login')->with('status', $message); //if user is already logged in it will redirect to the dashboard page
        
    } 
}
