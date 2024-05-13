<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;

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


Route::middleware(['auth.token'])->group(function () {
    Route::get('/booking', function () {
        return view('booking.index');
    });
});


Route::get('/register', [AuthController::class, 'indexRegister'])->name('auth.register');
Route::get('/login', [AuthController::class, 'indexLogin'])->name('auth.login');
Route::post('/login', [AuthController::class, 'loginProcess'])->name('auth.login.process');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
