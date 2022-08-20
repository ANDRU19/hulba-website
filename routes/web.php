<?php

use App\Http\Controllers\AuthPhoneController;
use App\Http\Controllers\CustomerBussinessDetailsController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\VerifyProfileCustomer;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::middleware('guest')->group(function () {
    Route::get('login', [AuthPhoneController::class, 'create'])->name('login');
    Route::post('login', [AuthPhoneController::class, 'store'])->name('verify.phone');;
    Route::post('verification', [AuthPhoneController::class, 'verification'])->name('verification');
});

Route::view('/', 'frontend.home');

Route::middleware('auth')->group(function () {
    
    /* Profile routes */
    Route::withoutMiddleware([VerifyProfileCustomer::class])->group(function () {
        Route::get('profile', [ProfileController::class, 'edit'])->name('profile');
        Route::post('profile/verification', [ProfileController::class, 'verification'])->name('profile.verification');
        Route::post('profile', [ProfileController::class, 'update'])->name('profile.update');
    });
    
    
    /* Customer bussiness details */
    Route::get('details', [CustomerBussinessDetailsController::class, 'create'])->name('customer.bussiness.details.create');
    Route::post('details', [CustomerBussinessDetailsController::class, 'store'])->name('customer.bussiness.details.store');
    

    Route::post('logout', [AuthPhoneController::class, 'destroy'])->name('logout');
    Route::get('payments', [PaymentController::class, 'index'])->name('payments');

    /* Products routes */
    Route::get('products', [ProductController::class, 'index'])->name('products');
    Route::get('products/{product}', [ProductController::class, 'show'])->name('products.show');

    Route::prefix('dashboard')->group(function () {

        Route::get('/', fn () => Inertia::render('Dashboard/Index'))->name('dashboard');
        Route::get('help', fn () => Inertia::render('Help'))->name('help');
        Route::get('index', [ DashboardController::class, 'index'])->name('dashboard.index');


        /* Products routes */
        Route::get('products', ['App\Http\Controllers\Dashboard\ProductController', 'index'])->name('products.list');
        Route::get('products/create', ['App\Http\Controllers\Dashboard\ProductController', 'create'])->name('products.create');
        Route::get('products/edit/{product}', ['App\Http\Controllers\Dashboard\ProductController', 'edit'])->name('products.edit');
        Route::post('products/store', ['App\Http\Controllers\Dashboard\ProductController', 'store'])->name('products.store');
        Route::post('products/update/{product}', ['App\Http\Controllers\Dashboard\ProductController', 'update'])->name('products.update');
        Route::delete('product/{product}', ['App\Http\Controllers\Dashboard\ProductController', 'destroy'])->name('products.destroy');

        Route::post('products/media/upload', ['App\Http\Controllers\Dashboard\ProductMediaController', 'store'])->name('products.media.store');

    });


    
});
