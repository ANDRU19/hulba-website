<?php

use App\Http\Controllers\AuthPhoneController;
use App\Http\Controllers\CategoryController;
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

Route::withoutMiddleware([VerifyProfileCustomer ::class])->group(function () {
    Route::get('profile', [ProfileController::class, 'edit'])->name('profile');
    Route::post('profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::view('/', 'frontend.home');
});

Route::middleware('auth')->group(function () {
    Route::post('logout', [AuthPhoneController::class, 'destroy'])->name('logout');

    Route::resource('category', CategoryController::class);
    
    Route::resource('product', ProductController::class)->except(['update']);
    Route::post('product/{product}', [ProductController::class, 'update'])->name('product.update');

    Route::get('payments', [PaymentController::class, 'index'])->name('payments');

    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->middleware(['auth', 'verified'])->name('dashboard');
});
