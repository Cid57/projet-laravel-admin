<?php

use App\Http\Controllers\ActivityController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

// Routes Admin
Route::get('/admin', [AdminController::class, 'showAdminPage'])->name('admin.page');
Route::post('/admin/add-user', [AdminController::class, 'addUser'])->name('admin.addUser');
Route::delete('/admin/delete-user/{id}', [AdminController::class, 'deleteUser'])->name('admin.deleteUser');
Route::put('/admin/edit-user/{id}', [AdminController::class, 'updateUser'])->name('admin.updateUser');
Route::get('/admin/user/{id}', [AdminController::class, 'showUserProfile'])->name('admin.userProfile');
Route::get('/admin/user/{id}/edit', [AdminController::class, 'editUserProfile'])->name('admin.userProfileEdit');
Route::put('/admin/user/{id}', [AdminController::class, 'updateUserProfile'])->name('admin.userProfileUpdate');

// Routes pour les Activités
Route::get('/activities', [ActivityController::class, 'index'])->name('activities.index');
Route::get('/activities/create', [ActivityController::class, 'create'])->name('activities.create');
Route::post('/activities', [ActivityController::class, 'store'])->name('activities.store');
Route::get('/activities/{id}', [ActivityController::class, 'show'])->name('activities.show');
Route::get('/activities/{id}/edit', [ActivityController::class, 'edit'])->name('activities.edit');
Route::put('/activities/{id}', [ActivityController::class, 'update'])->name('activities.update');
Route::delete('/activities/{id}', [ActivityController::class, 'destroy'])->name('activities.destroy');
