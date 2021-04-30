<?php

use Illuminate\Support\Facades\Route;
use App\Services\Documents\Http\Controllers\AdminDocumentsController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use App\Services\Users\Http\Controllers\VerifyEmailController;
use Laravel\Fortify\Http\Controllers\EmailVerificationNotificationController;
use Laravel\Fortify\Http\Controllers\EmailVerificationPromptController;

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
//    ->middleware(['throttle:6,1'])
    ->name('verification.verify');

Route::get('/email/verify', [EmailVerificationPromptController::class, '__invoke'])
    ->middleware(['auth'])
    ->name('verification.notice');

Route::post('/email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
    ->middleware(['auth', 'throttle:6,1'])
    ->name('verification.send');




Route::group([
    'middleware' => ['auth:sanctum', 'auth', 'verified'],
    'prefix' => LaravelLocalization::setLocale() ?? null
], function(){

    Route::get('/dashboard', function () {
        return view('welcome');
    });
});
