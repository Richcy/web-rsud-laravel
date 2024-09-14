<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\TentangController;
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


// Group routes with the /admin prefix
Route::prefix('admin')->group(function () {
    Route::get('/index', [AdminController::class, 'index']);
    Route::get('/buttons', [AdminController::class, 'buttons']);
    Route::get('/cards', [AdminController::class, 'cards']);
    Route::get('/animation', [AdminController::class, 'utilitiesAnimation']);
    Route::get('/color', [AdminController::class, 'utilitiesColor']);
    Route::get('/border', [AdminController::class, 'utilitiesBorder']);
    Route::get('/other', [AdminController::class, 'utilitiesOther']);
    Route::get('/login', [AdminController::class, 'login']);
    Route::get('/register', [AdminController::class, 'register']);
    Route::get('/password', [AdminController::class, 'forgotPassword']);
    Route::get('/404', [AdminController::class, 'page404']);
    Route::get('/blank', [AdminController::class, 'blank']);
    Route::get('/charts', [AdminController::class, 'charts']);
    Route::get('/tables', [AdminController::class, 'tables']);
});


