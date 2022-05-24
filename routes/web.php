<?php

use App\Http\Controllers\VerificationEmailController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\App;
use Illuminate\Foundation\Auth\EmailVerificationRequest;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/test', function(){
    return "hai";
});

Route::get('/email/verify/{id}/{hash}',  [VerificationEmailController::class,'verify']);
// ->middleware([''])->name('verification.verify');

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


// Route::get('/{locale}', function ($locale){
//     // echo $locale;
//     App::setLocale($locale);
//     return view('welcome');
// });  

Route::get('language/{locale}', function ($locale) {
    
    app()->setLocale($locale);
    session()->put('locale', $locale);
    return redirect()->back();
});