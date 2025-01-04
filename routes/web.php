<?php

use App\Http\Controllers\AdminViewController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\UserViewController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\DoctorScheduleController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\EventCategoryController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ArticleCategoryController;
use App\Http\Controllers\CareerController;
use Illuminate\Support\Facades\Route;


Route::get('/', [UserViewController::class, 'index']);

Route::get('/inner', function () {
    return view('inner-page');
});

Route::get('/{slug}', [UserViewController::class, 'showPage'])->name('page.show');

Route::get('/dokter/{id}', [UserViewController::class, 'doctorDetail'])->name('doctor.detail');

Route::get('/event/{id}', [UserViewController::class, 'eventDetail'])->name('event.detail');

Route::get('/artikel/{id}', [UserViewController::class, 'articleDetail'])->name('article.detail');

Route::get('/cimanews/{id}', [UserViewController::class, 'articleDetail'])->name('cimanews.detail');

Route::get('/karir/{id}', [UserViewController::class, 'careerDetail'])->name('career.detail');


Route::prefix('admin')->group(function () {

    Route::get('login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
    Route::post('login', [AdminAuthController::class, 'login']);
    Route::post('logout', [AdminAuthController::class, 'logout'])->name('admin.logout');
    Route::get('/register', [AdminViewController::class, 'register']);
    Route::get('/forgot-password', [AdminViewController::class, 'forgotPassword']);


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

        Route::resource('products', ProductController::class);
        Route::resource('admins', AdminController::class);
        Route::resource('dokter', DoctorController::class);
        Route::get('/bidang-dokter', [DoctorController::class, 'showFieldDoctor'])->name('dokter.showDoctorField');
        Route::post('/bidang-dokter', [DoctorController::class, 'storeFieldDoctor'])->name('dokter.storeDoctorField');
        Route::match(['put', 'patch'], '/bidang-dokter/{id}', [DoctorController::class, 'updateFieldDoctor'])->name('dokter.updateDoctorField');
        Route::delete('/bidang-dokter/{id}', [DoctorController::class, 'destroyFieldDoctor'])->name('dokter.destroyDoctorField');
        Route::get('/featured-dokter', [DoctorController::class, 'showFeaturedDoctor'])->name('dokter.showFeaturedDoctor');
        Route::post('/featured-dokter', [DoctorController::class, 'storeFeaturedDoctor'])->name('dokter.storeFeaturedDoctor');
        Route::delete('/featured-dokter/{id}', [DoctorController::class, 'destroyFeaturedDoctor'])->name('dokter.destroyFeaturedDoctor');
        Route::resource('jadwal-dokter', DoctorScheduleController::class);
        Route::resource('event', EventController::class);
        Route::get('/kategori-event', [EventCategoryController::class, 'showEventCategory'])->name('event.showEventCategory');
        Route::post('/kategori-event', [EventCategoryController::class, 'storeEventCategory'])->name('event.storeEventCategory');
        Route::match(['put', 'patch'], '/kategori-event/{id}', [EventCategoryController::class, 'updateEventCategory'])->name('event.updateEventCategory');
        Route::delete('/kategori-event/{id}', [EventCategoryController::class, 'destroyEventCategory'])->name('event.destroyEventCategory');
        Route::resource('artikel', ArticleController::class);
        Route::get('/kategori-artikel', [ArticleCategoryController::class, 'showArticleCategory'])->name('article.showArticleCategory');
        Route::post('/kategori-artikel', [ArticleCategoryController::class, 'storeArticleCategory'])->name('article.storeArticleCategory');
        Route::match(['put', 'patch'], '/kategori-artikel/{id}', [ArticleCategoryController::class, 'updateArticleCategory'])->name('article.updateArticleCategory');
        Route::delete('/kategori-artikel/{id}', [ArticleCategoryController::class, 'destroyArticleCategory'])->name('article.destroyArticleCategory');
        Route::resource('karir', CareerController::class);


        Route::get('/{slug}', [ServiceController::class, 'showPage'])->name('admin.page.type');


        Route::put('/{slug}', [ServiceController::class, 'updatePage'])->name('admin.page.update');
    });
});
