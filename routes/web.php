<?php

use Illuminate\Support\Facades\Route;
use App\Services\Documents\Http\Controllers\DocumentController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
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

Route::group([
    'middleware' => ['auth:sanctum', 'verified'],
    'prefix' => LaravelLocalization::setLocale()
], function(){

    Route::resource(__('routes.documents'), DocumentController::class, ['names' => 'documents']);
});
