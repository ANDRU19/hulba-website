<?php

use App\Http\Controllers\AuthPhoneController;
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

Route::get('/', function () {
    return Inertia::render('Home', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register')
    ]);
});

Route::middleware('guest')->group(function () {
    Route::get('login', [AuthPhoneController::class, 'create'])->name('login');
    Route::post('login', [AuthPhoneController::class, 'store']);
    Route::post('verification', [AuthPhoneController::class, 'verification'])->name('verification');
});

Route::post('logout', [AuthPhoneController::class, 'destroy'])->name('logout');

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

//require __DIR__.'/auth.php';
