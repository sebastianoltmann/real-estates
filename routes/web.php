<?php

use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use App\Services\Users\Http\Controllers\VerifyEmailController;
use App\Services\Users\Http\Controllers\EmailVerificationPromptController;
use App\Services\Users\Http\Controllers\EmailVerificationNotificationController;
use App\Providers\RouteServiceProvider;
use App\Services\RealEstates\Http\Controllers\RealEstatesController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/email/verify/{user}/{hash}', [VerifyEmailController::class, '__invoke'])
    ->middleware(['throttle:6,1'])
    ->name('verification.verify');

Route::get('/email/verify', [EmailVerificationPromptController::class, '__invoke'])
    ->middleware(['auth'])
    ->name('verification.notice');

Route::post('/email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
    ->middleware(['auth', 'throttle:6,1'])
    ->name('verification.send');




Route::group([
    'middleware' => ['auth:sanctum', 'auth', 'verified']
], function(){

    Route::get('/', function() {
        return redirect(RouteServiceProvider::HOME);
    });

    Route::get('/real-estates', [RealEstatesController::class, 'index'])->name('realEstates.index');
    Route::get('/real-estates/{real_estate}', [RealEstatesController::class, 'show'])->name('realEstates.show');
});
