<?php

use App\Providers\RouteServiceProvider;
use App\Services\Documents\Http\Controllers\AdminDocumentsController;
use App\Services\Projects\Http\Controllers\AdminProjectController;
use App\Services\RealEstates\Http\Controllers\AdminRealEstatesController;
use App\Services\RealEstates\Http\Controllers\AdminRealEstatesDocumentsController;
use App\Services\Trash\Http\Controllers\AdminTrashController;
use App\Services\Users\Http\Controllers\AdminUsersController;
use Illuminate\Support\Facades\Route;
use Laravel\Jetstream\Http\Controllers\CurrentTeamController;
use Laravel\Jetstream\Http\Controllers\Livewire\UserProfileController;
use Laravel\Jetstream\Jetstream;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

if(Jetstream::hasTeamFeatures()) {
    Route::put('admin/current-project', [CurrentTeamController::class, 'update'])->name('current-project.update');
    Route::resource(__('routes.projects'), AdminProjectController::class, [
        'names' => 'projects',
        'parameters' => [__('routes.projects') => 'project'],
        'only' => ['create', 'show'],
    ]);
}

Route::get('admin/user/profile', [UserProfileController::class, 'show'])
    ->name('profile.show');

Route::resourceLang('users', AdminUsersController::class);
Route::resourceLang('documents', AdminDocumentsController::class);
Route::resourceLang('real-estates', AdminRealEstatesController::class)->names('realEstates');
Route::resourceLang('real-estates.documents', AdminRealEstatesDocumentsController::class)
    ->names('realEstates.documents')
    ->except(['index', 'show']);


Route::get(LaravelLocalization::transRoute('routes.trash.index'), [AdminTrashController::class, 'index'])->name('trash.index');
Route::patch(LaravelLocalization::transRoute('routes.trash.restore'), [AdminTrashController::class, 'restore'])->name('trash.restore');
Route::delete(LaravelLocalization::transRoute('routes.trash.forceDelete'), [AdminTrashController::class, 'forceDelete'])->name('trash.forceDelete');


//Route::resource(__('routes.real_estates') . '.' . __('routes.documents'), AdminRealEstatesDocumentsController::class, ['names' => 'realEstates.documents']);
