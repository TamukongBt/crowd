<?php

use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InfoUserController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DonationController;
use App\Http\Controllers\CampaignController;
use App\Http\Controllers\CampaignRequestController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ResetController;
use App\Http\Controllers\SessionsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Route;

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


Route::group(['middleware' => 'auth'], function () {

    Route::get('/', [HomeController::class, 'home']);
    Route::get('dashboard', function () {
        return view('auth.dashboard');
    })->name('dashboard');
    Route::get('profile', function () {
        return view('profile');
    })->name('profile');




    Route::get('/logout', [SessionsController::class, 'destroy']);

    Route::get('/users', [InfoUserController::class, 'users'])->name('users.index');
    Route::get('/user/role/{id}/{roles}', [InfoUserController::class, 'userole']);
    Route::get('/user-profile', [InfoUserController::class, 'create']);
    Route::post('/user-profile', [InfoUserController::class, 'store']);
    Route::get('/login', function () {
        return view('auth.dashboard');
    })->name('sign-up');

// Donations Handler
    //
    Route::resource('donation', DonationController::class);
    Route::get('/mydonation', [DonationController::class, 'show'])->name('donation.index');
    Route::resource('request', CampaignRequestController::class);
    Route::get('request/{decision}/{id}', [CampaignRequestController::class, 'decision'])->name('request.decision');
});



Route::group(['middleware' => 'guest'], function () {
    Route::get('/register', [RegisterController::class, 'create']);
    Route::post('/register', [RegisterController::class, 'store']);
    Route::get('/login', [SessionsController::class, 'create']);
    Route::post('/session', [SessionsController::class, 'store']);
    Route::get('/login/forgot-password', [ResetController::class, 'create']);
    Route::post('/forgot-password', [ResetController::class, 'sendEmail']);
    Route::get('/reset-password/{token}', [ResetController::class, 'resetPass'])->name('password.reset');
    Route::post('/reset-password', [ChangePasswordController::class, 'changePassword'])->name('password.update');
});

Route::get('/login', function () {
    return view('session/login-session');
})->name('login');

Route::get('welcome', function () {
    return view('welcome');
})->name('welcome');


Route::post('/donation', [DonationController::class, 'starttrans'])->name('donation.start');

Route::get('success', [DonationController::class, 'success'])->name('success');

Route::get('campaigns', [CampaignController::class, 'show']);
Route::get('campaign/{id}', [CampaignController::class, 'showid']);

// Route::get('momo/{amount}/{name}/{email}/{phone}/{campaign_id}', [PaymentController::class, 'momo'])->name('momo');
Route::get('store/{amount}/{name}/{email}/{phone}/{campaign_id}', [PaymentController::class, 'store'])->name('store');




