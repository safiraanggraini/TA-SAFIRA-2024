<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [HomeController::class, 'index'])->name('home.index');

// Route::middleware(['auth.token'])->group(function () {
//     Route::get('/booking', function () {
//         return view('booking.index');
//     });
// });

Route::get('coba', function () {
    return view('welcome');
});

Route::middleware(['admin'])->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.konten.dashboard');
    })->name('admin.dashboard');
});

Route::middleware(['customer'])->group(function () {
    Route::resource('booking', BookingController::class);
    Route::resource('profile', ProfileController::class);
    Route::put('/profile/change-password/{id}', [ProfileController::class, 'changePassword'])->name('profile.changePassword');
});

Route::get('/register', [AuthController::class, 'indexRegister'])->name('auth.register');
Route::post('/register', [AuthController::class, 'registerProcess'])->name('auth.register.process');
Route::get('/login', [AuthController::class, 'indexLogin'])->name('auth.login');
Route::post('/login', [AuthController::class, 'loginProcess'])->name('auth.login.process');
Route::get('/logout', [AuthController::class, 'logout'])->name('auth.logout');
