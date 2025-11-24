<?php
use App\Http\Controllers\ArticleController; 
use App\Http\Controllers\CategoryController; 
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    // Kalau sudah login → ke dashboard
    if (Auth::check()) {
        return redirect()->route('dashboard');
    }

    // Kalau belum login → ke halaman register
    return redirect()->route('register');
});

Route::middleware([ 
    'auth:sanctum', 
    config('jetstream.auth_session'), 
    'verified', 
])->group(function () { 
    Route::get('/dashboard', function () { 
        return view('dashboard'); 
    })->name('dashboard'); 
}); 

// Route dengan auth umum dan permission 'manage categories' untuk kategori 
Route::middleware(['auth', 'role_or_permission:manage categories'])->group(function () { 
    // Kategori hanya bisa diakses oleh user yang memiliki permission 'manage categories' 
    Route::resource('categories', CategoryController::class); 

    // Route artikel yang tidak memerlukan permission khusus 
    Route::get('articles', [ArticleController::class, 'index'])->name('articles.index'); 
    Route::get('articles/create', [ArticleController::class, 'create'])->name('articles.create'); 
    Route::post('articles', [ArticleController::class, 'store'])->name('articles.store'); 
}); 

// Akses edit artikel hanya untuk user dengan permission "edit articles" 
Route::middleware('permission:edit articles')->group(function () { 
    Route::get('articles/{article}/edit', [ArticleController::class, 'edit'])->name('articles.edit'); 
    Route::put('articles/{article}', [ArticleController::class, 'update'])->name('articles.update'); 
}); 
// Akses hapus artikel hanya untuk user dengan permission "delete articles" 
Route::middleware('permission:delete articles')->group(function () { 
    Route::delete('articles/{article}', [ArticleController::class, 'destroy'])->name('articles.destroy'); 
}); 

Route::get('/dashboard',  [DashboardController::class, 'index'] )
    ->middleware(['auth', 'verified']
    )->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth'])->group(function () {
    Route::resource('posts', PostController::class);
});

require __DIR__.'/auth.php';
