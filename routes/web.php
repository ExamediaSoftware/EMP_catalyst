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

Route::get('/application', function () {
    return view('pages.application');
})->name('application')->middleware(['auth']);

// Route::group(
//     ['middleware' => ['auth', 'role:Super Admin|Admin|Staf|Tenant|Owner']],
//     function () {
//         // uses 'auth' middleware plus all middleware from $middlewareGroups['role']
//         Route::resource('profile', App\Http\Controllers\ProfileController::class);
//         Route::resource('house', App\Http\Controllers\HouseController::class);
//         Route::resource('houseimage', App\Http\Controllers\HouseImageController::class);
//         Route::resource('houseowner_bankaccount', App\Http\Controllers\HouseOwnerBankAccountController::class);
//         Route::resource('housedoc', App\Http\Controllers\HouseDocController::class);
//         Route::resource(
//             'houseagreement',
//             App\Http\Controllers\HouseAgreementController::class
//         );
//         Route::resource('houseagreementlinks', App\Http\Controllers\HouseAgreementLinkController::class);
//         Route::resource('housemedia', App\Http\Controllers\HouseMediaController::class);
//         Route::resource('housetenant', App\Http\Controllers\HouseTenantController::class);
//         Route::resource('houseutility', App\Http\Controllers\HouseUtilityController::class);
//         Route::resource('houseutilityinfo', App\Http\Controllers\HouseUtilityInfoController::class);
//         Route::resource('housetax', App\Http\Controllers\HouseTaxController::class);
//         Route::resource('housecost', App\Http\Controllers\HouseCostController::class);
//         Route::resource('houseinvoice', App\Http\Controllers\HouseInvoiceController::class);
//         Route::resource('housereceipt', App\Http\Controllers\HouseReceiptController::class);

//         Route::get(
//             'user/tenant',
//             'App\Http\Controllers\UserController@index_tenant'
//         )->middleware('auth')->name('usertenant');
//     }
// );
