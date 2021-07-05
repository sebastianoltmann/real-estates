<?php

use Illuminate\Support\Facades\Route;
use App\Services\Users\Http\Controllers\VerifyEmailController;
use App\Services\Users\Http\Controllers\EmailVerificationPromptController;
use App\Services\Users\Http\Controllers\EmailVerificationNotificationController;
use App\Services\Pages\Http\Controllers\PagesController;
use App\Services\RealEstates\Http\Controllers\RealEstatesController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use App\Services\RealEstates\Http\Controllers\RealEstatesDocumentsController;
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

Route::get('/email/verify/{user}/{hash}', [VerifyEmailController::class, '__invoke'])
    ->middleware(['throttle:6,1'])
    ->name('verification.verify');

Route::get('/email/verify', [EmailVerificationPromptController::class, '__invoke'])
    ->middleware(['auth'])
    ->name('verification.notice');

Route::post('/email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
    ->middleware(['auth', 'throttle:6,1'])
    ->name('verification.send');



Route::get(LaravelLocalization::transRoute('routes.pages.index'), [PagesController::class, 'index'])->name('pages.index');
Route::get(LaravelLocalization::transRoute('routes.pages.show'), [PagesController::class, 'show'])->name('pages.show')
    ->where('slug', '[\w\s\-_\/]+');

Route::group([
    'middleware' => ['auth:sanctum', 'auth', 'verified']
], function(){

    Route::resource('real-estates', RealEstatesController::class)
        ->names('realEstates')
        ->only(['index', 'show']);

    Route::resource('real-estates.documents', RealEstatesDocumentsController::class)
        ->names('realEstates.documents')
        ->only('show');
});
