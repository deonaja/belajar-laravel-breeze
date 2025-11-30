<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserManagementController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PermissionController;  
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// Redirect '/' sesuai status login
Route::get('/', function () {
    return Auth::check()
        ? redirect()->route('dashboard')
        : redirect()->route('register');
});

// Semua route internal butuh Login & Verified Email
Route::middleware(['auth', 'verified'])->group(function () {

    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');

    // Posts → full access by permission
    Route::resource('posts', PostController::class);

    // Roles
    Route::resource('roles', RoleController::class)
        ->middleware('permission:manage roles');

    // Permissions
    Route::resource('permissions', PermissionController::class)
        ->middleware('permission:manage permissions');

    // User Management
    Route::resource('users', UserManagementController::class)
        ->except(['create', 'store'])
        ->middleware('permission:manage users');

    // Verify Email
    Route::middleware(['permission:manage users'])->group(function () {
        Route::patch('/users/{user}/verify', [UserManagementController::class, 'verify'])
            ->middleware(['auth', 'permission:manage users'])
            ->name('users.verify');
    });


    // Categories
    Route::resource('categories', CategoryController::class)
        ->middleware('permission:manage categories');

    // Articles
    Route::resource('articles', ArticleController::class)->only([
        'index', 'create', 'store', 'edit', 'update', 'destroy'
    ]);

    // Separate permissions for each article function
    Route::middleware('permission:view posts')->get('articles', [ArticleController::class, 'index']);
    Route::middleware('permission:create posts')->get('articles/create', [ArticleController::class, 'create']);
    Route::middleware('permission:edit posts')->get('articles/{article}/edit', [ArticleController::class, 'edit']);
    Route::middleware('permission:delete posts')->delete('articles/{article}', [ArticleController::class, 'destroy']);

    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});

require __DIR__.'/auth.php';
