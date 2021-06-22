<?php

use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\AdminProfileController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\CouponController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\HomeSliderController;
use App\Http\Controllers\Backend\NewsletterController;
use App\Http\Controllers\Backend\PasswordController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\Shipping\ShipDistrictController;
use App\Http\Controllers\Backend\Shipping\ShipDivisionController;
use Illuminate\Support\Facades\Route;

// Admin Login Route

Route::middleware(['guest:admin'])->group(function () {
    Route::get('/login', [AdminController::class, 'loginForm'])->name('login');
    Route::post('/login', [AdminController::class, 'store'])->name('login.store');
});

// IF Admin is loggedin

Route::middleware(['auth:admin', 'verified'])->group(function () {

    Route::get('/', DashboardController::class)->name('dashboard');

    Route::post('/logout', [AdminController::class, 'destroy'])->name('logout');

    Route::resource('profile', AdminProfileController::class)->only(['index','update']);

    Route::get('change-password', [PasswordController::class, 'index'])->name('change.password.index');

    Route::put('change-password', [PasswordController::class, 'update'])->name('update.password');

    Route::resource('category', CategoryController::class)->except(['create', 'show']);

    Route::resource('brands', BrandController::class)->except(['create','show']);

    Route::resource('coupons', CouponController::class)->except(['show']);

    Route::resource('subscribers', NewsletterController::class)->only(['index','destroy']);

    Route::resource('products', ProductController::class)->except(['show']);

    Route::resource('home-sliders', HomeSliderController::class)->except(['show']);

    Route::prefix('shipping')->name('shipping.')->group(function (){

        Route::resource('division', ShipDivisionController::class);

        Route::resource('district', ShipDistrictController::class);
    });
});
