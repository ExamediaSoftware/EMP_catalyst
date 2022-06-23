<?php

use App\Events\NotifyAdmin;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\VerificationEmailController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\UserController;
use App\Models\Application;
use App\Models\Notification;
use App\Models\User;
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

Route::get('/email/verify/{id}/{hash}',  [VerificationEmailController::class,'verify'])
->name('verification.verify');

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

Route::get('/language/{locale}', function ($locale) {
    
    app()->setLocale($locale);
    session()->put('locale', $locale);
    return redirect()->back();
});

// Route::get('/listapplication', function () {
//     return view('pages.list-application');
// })->name('list-application')->middleware(['auth']);

Route::get('/listapplication', [ApplicationController::class, 'index'])->name('list-application.index')->middleware(['auth']);

// Route::get('/application', function () {

    
// })->name('application')->middleware(['auth']);

Route::group(
    ['middleware' => ['auth']],
    function () {
        // uses 'auth' middleware plus all middleware from $middlewareGroups['role']
        Route::resource('application', ApplicationController::class);
        
        
    }
);

Route::group(
    ['middleware' => ['auth','role:Super-Admin|Admin']],
    function () {
        // uses 'auth' middleware plus all middleware from $middlewareGroups['role']
        
        Route::resource('user', UserController::class);
        Route::resource('admin', AdminController::class);
        // Route::get('/admin/review', [AdminController::class, 'edit'])->name('reviewapplication');
        Route::get('/notifications', function(){
            
            return view('pages.admin-list-application');
        })->name('notification');
    }
);



Route::get('/event1', function(){
    
    Notification::create([
        'user_id' => 1,
        'message' => 'Hai',
        'isRead' => 0,
    ]);
    return event(new NotifyAdmin('Hai'));
});