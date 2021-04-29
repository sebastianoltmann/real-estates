<?php

use Illuminate\Support\Facades\Route;
use App\Services\Users\Http\Controllers\AdminUsersController;

Route::get('/dashboard', function () {
    return view('welcome');
});

Route::resource(__('routes.users'), AdminUsersController::class, ['names' => 'users']);
