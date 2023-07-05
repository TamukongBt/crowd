<?php

use App\Http\Controllers\Api\DonationController;
use App\Http\Controllers\InfoUserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {

//     // Route::apiResource('donation', DonationController::class)->name('donation', 'donation');
//     Route::post('transfer', [DonationController::class,'starttrans']);

// });

Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::post('transfer', [App\Http\Controllers\Api\DonationController::class,'starttrans']);
});



Route::post("login",[InfoUserController::class,'index']);



