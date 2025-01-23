<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Routes d'authentification
Auth::routes();

// Route d'accueil
Route::get('/', function () {
    return view('welcome');
});

// Routes pour l'administration
Route::middleware(['auth'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/page', [AdminController::class, 'index'])->name('admin.page');
    Route::get('/admin/users', [AdminController::class, 'users'])->name('admin.users');
    Route::get('/admin/activities', [AdminController::class, 'activities'])->name('admin.activities');
    Route::get('/admin/settings', [AdminController::class, 'settings'])->name('admin.settings');

    // Routes pour la gestion des utilisateurs
    Route::post('/admin/users/add', [AdminController::class, 'addUser'])->name('admin.addUser');
    Route::get('/admin/users/{id}', [AdminController::class, 'getUser'])->name('admin.users.get');
    Route::put('/admin/users/{id}', [AdminController::class, 'editUser'])->name('admin.users.edit');
    Route::delete('/admin/users/{id}', [AdminController::class, 'deleteUser'])->name('admin.users.delete');

    // Routes pour le profil utilisateur
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::put('/password', [ProfileController::class, 'updatePassword'])->name('password.update');

    // Routes pour la gestion des activités
    Route::get('/activities', [ActivityController::class, 'index'])->name('activities.index');
    Route::get('/activities/create', [ActivityController::class, 'create'])->name('activities.create');
    Route::post('/activities', [ActivityController::class, 'store'])->name('activities.store');
    Route::get('/activities/{id}', [ActivityController::class, 'show'])->name('activities.show');
    Route::get('/activities/{id}/edit', [ActivityController::class, 'edit'])->name('activities.edit');
    Route::put('/activities/{id}', [ActivityController::class, 'update'])->name('activities.update');
    Route::delete('/activities/{id}', [ActivityController::class, 'destroy'])->name('activities.destroy');
});
