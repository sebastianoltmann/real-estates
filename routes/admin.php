<?php

use Illuminate\Support\Facades\Route;
use App\Services\Users\Http\Controllers\AdminUsersController;
use App\Services\Documents\Http\Controllers\AdminDocumentsController;

Route::get('/dashboard', function () {
    return view('welcome');
});

Route::resource(__('routes.users'), AdminUsersController::class, ['names' => 'users']);
Route::resource(__('routes.documents'), AdminDocumentsController::class, ['names' => 'documents']);
