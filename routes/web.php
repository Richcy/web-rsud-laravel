<?php

use App\Http\Controllers\AdminViewController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TentangController;
use App\Http\Controllers\ProductController;
use App\Models\Admin;
use Illuminate\Support\Facades\Route;

// Default home page route
Route::get('/', function () {
    return view('index');
});

Route::get('/inner', function () {
    return view('inner-page');
});

// Group routes with the /tentang prefix
Route::prefix('tentang')->group(function () {
    Route::get('/denah', [TentangController::class, 'denah']);
    Route::get('/hak', [TentangController::class, 'hak']);
    Route::get('/maklumat', [TentangController::class, 'maklumat']);
    Route::get('/mutu', [TentangController::class, 'mutu']);
    Route::get('/profil', [TentangController::class, 'profil']);
    Route::get('/sambutan', [TentangController::class, 'sambutan']);
    Route::get('/standard', [TentangController::class, 'standard']);
    Route::get('/struktur', [TentangController::class, 'struktur']);
});

Route::prefix('admin')->group(function () {
    // Admin Authentication Routes
    Route::get('login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
    Route::post('login', [AdminAuthController::class, 'login']);
    Route::post('logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

    // Admin Routes (Protected by auth:admin middleware)
    Route::middleware('auth:admin')->group(function () {
        Route::get('/index', [AdminViewController::class, 'index'])->name('admin.index');
        Route::get('/buttons', [AdminViewController::class, 'buttons']);
        Route::get('/cards', [AdminViewController::class, 'cards']);
        Route::get('/animation', [AdminViewController::class, 'utilitiesAnimation']);
        Route::get('/color', [AdminViewController::class, 'utilitiesColor']);
        Route::get('/border', [AdminViewController::class, 'utilitiesBorder']);
        Route::get('/other', [AdminViewController::class, 'utilitiesOther']);
        Route::get('/register', [AdminViewController::class, 'register']);
        Route::get('/password', [AdminViewController::class, 'forgotPassword']);
        Route::get('/404', [AdminViewController::class, 'page404']);
        Route::get('/blank', [AdminViewController::class, 'blank']);
        Route::get('/charts', [AdminViewController::class, 'charts']);
        Route::get('/tables', [AdminViewController::class, 'tables']);
        
        // Resource Routes
        Route::resource('products', ProductController::class);
        Route::resource('admins', AdminController::class);
    });
});




