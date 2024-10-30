<?php

use App\Http\Controllers\AdminViewController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\UserViewController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\EventController;
use Illuminate\Support\Facades\Route;

// Default home page route
Route::get('/', [UserViewController::class, 'index']);

Route::get('/inner', function () {
    return view('inner-page');
});

Route::get('/{slug}', [UserViewController::class, 'showPage'])->name('page.show');

Route::prefix('admin')->group(function () {
    // Admin Authentication Routes
    Route::get('login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
    Route::post('login', [AdminAuthController::class, 'login']);
    Route::post('logout', [AdminAuthController::class, 'logout'])->name('admin.logout');
    Route::get('/register', [AdminViewController::class, 'register']);
    Route::get('/forgot-password', [AdminViewController::class, 'forgotPassword']);

    // Admin Routes (Protected by auth.admin custom middleware)
    Route::middleware('auth.admin')->group(function () {
        Route::get('/index', [AdminViewController::class, 'index'])->name('admin.index');
        Route::get('/buttons', [AdminViewController::class, 'buttons']);
        Route::get('/cards', [AdminViewController::class, 'cards']);
        Route::get('/animation', [AdminViewController::class, 'utilitiesAnimation']);
        Route::get('/color', [AdminViewController::class, 'utilitiesColor']);
        Route::get('/border', [AdminViewController::class, 'utilitiesBorder']);
        Route::get('/other', [AdminViewController::class, 'utilitiesOther']);
        Route::get('/404', [AdminViewController::class, 'page404']);
        Route::get('/blank', [AdminViewController::class, 'blank']);
        Route::get('/charts', [AdminViewController::class, 'charts']);
        Route::get('/tables', [AdminViewController::class, 'tables']);

        // Resource Routes
        Route::resource('products', ProductController::class);
        Route::resource('admins', AdminController::class);
        Route::resource('dokter', DoctorController::class);
        Route::resource('event', EventController::class);

        // Route for getting the service by type
        Route::get('/{slug}', [ServiceController::class, 'showPage'])->name('admin.page.type');

        // Route for updating the service by type
        Route::put('/{slug}', [ServiceController::class, 'updatePage'])->name('admin.page.update');
    });
});
