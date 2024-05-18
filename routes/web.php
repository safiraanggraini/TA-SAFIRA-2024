<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PaketWisataController;
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

// Route::get('/coba', function () {
//     return view('welcome');
// });


Route::get('404', function () {
    return view('404');
});

Route::middleware(['admin'])->group(function () {
    Route::resource('dashboard', DashboardController::class);
    Route::resource('pesanan', PesananController::class);
    Route::resource('user', UserController::class);
    Route::resource('paket-wisata', PaketWisataController::class);
    Route::post('/orders/{id}/check_order', [PesananController::class, 'isChecked'])->name('orders.check');
});

Route::middleware(['customer'])->group(function () {
    Route::resource('booking', BookingController::class);
    Route::resource('profile', ProfileController::class);
    Route::put('/profile/change-password/{id}', [ProfileController::class, 'changePassword'])->name('profile.changePassword');
    Route::get('/success', function () {
        return view('booking.success');
    });
});

Route::get('/register', [AuthController::class, 'indexRegister'])->name('auth.register');
Route::post('/register', [AuthController::class, 'registerProcess'])->name('auth.register.process');
Route::get('/login', [AuthController::class, 'indexLogin'])->name('auth.login');
Route::post('/login', [AuthController::class, 'loginProcess'])->name('auth.login.process');
Route::get('/logout', [AuthController::class, 'logout'])->name('auth.logout');
