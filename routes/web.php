<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');


Route::get('/admin', [AdminController::class, 'showAdminPage'])->name('admin.page');
Route::post('/admin/add-user', [AdminController::class, 'addUser'])->name('admin.addUser');
Route::delete('/admin/delete-user/{id}', [AdminController::class, 'deleteUser'])->name('admin.deleteUser');
Route::put('/admin/edit-user/{id}', [AdminController::class, 'updateUser'])->name('admin.updateUser');
Route::get('/admin/user/{id}', [AdminController::class, 'showUserProfile'])->name('admin.userProfile');

Route::get('/admin/user/{id}/edit', [AdminController::class, 'editUserProfile'])->name('admin.userProfileEdit');

Route::put('/admin/user/{id}', [AdminController::class, 'updateUserProfile'])->name('admin.userProfileUpdate');
