<?php

use App\Http\Controllers\AuthController; // Mengimpor AuthController dari App\Http\Controllers
use App\Http\Controllers\BookingController; // Mengimpor BookingController dari App\Http\Controllers
use App\Http\Controllers\HomeController; // Mengimpor HomeController dari App\Http\Controllers
use App\Http\Controllers\DashboardController; // Mengimpor DashboardController dari App\Http\Controllers
use App\Http\Controllers\ProfileController; // Mengimpor ProfileController dari App\Http\Controllers
use App\Http\Controllers\PesananController; // Mengimpor PesananController dari App\Http\Controllers
use App\Http\Controllers\UserController; // Mengimpor UserController dari App\Http\Controllers
use App\Http\Controllers\PaketWisataController; // Mengimpor PaketWisataController dari App\Http\Controllers
use Illuminate\Support\Facades\Route; // Mengimpor facade Route dari Illuminate\Support\Facades

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

Route::get('/', [HomeController::class, 'index'])->name('home.index'); // Mendefinisikan route GET untuk beranda yang menggunakan metode 'index' dari HomeController

// Route::middleware(['auth.token'])->group(function () {
//     Route::get('/booking', function () {
//         return view('booking.index');
//     });
// }); // Route ini dikomentari, digunakan untuk mengelompokkan route yang membutuhkan middleware 'auth.token'

// Route::get('/coba', function () {
//     return view('welcome');
// }); // Route ini dikomentari, mendefinisikan route GET untuk menampilkan view 'welcome'

Route::get('404', function () {
    return view('404');
}); // Mendefinisikan route GET untuk menampilkan halaman 404

Route::middleware(['admin'])->group(function () { // Mengelompokkan route yang membutuhkan middleware 'admin'
    Route::resource('dashboard', DashboardController::class); // Mendefinisikan resource route untuk DashboardController
    Route::resource('pesanan', PesananController::class); // Mendefinisikan resource route untuk PesananController
    Route::resource('user', UserController::class); // Mendefinisikan resource route untuk UserController
    Route::resource('paket-wisata', PaketWisataController::class); // Mendefinisikan resource route untuk PaketWisataController
    Route::post('/orders/{id}/check_order', [PesananController::class, 'isChecked'])->name('orders.check'); // Mendefinisikan route POST untuk memeriksa pesanan dengan metode 'isChecked' dari PesananController
});

Route::middleware(['customer'])->group(function () { // Mengelompokkan route yang membutuhkan middleware 'customer'
    Route::resource('booking', BookingController::class); // Mendefinisikan resource route untuk BookingController
    Route::resource('profile', ProfileController::class); // Mendefinisikan resource route untuk ProfileController
    Route::put('/profile/change-password/{id}', [ProfileController::class, 'changePassword'])->name('profile.changePassword'); // Mendefinisikan route PUT untuk mengubah password dengan metode 'changePassword' dari ProfileController
    Route::get('/success', function () {
        $title = 'Success'; 
        return view('booking.success', ['title' => $title]);
    }); // Mendefinisikan route GET untuk menampilkan halaman sukses setelah booking
});

Route::get('/register', [AuthController::class, 'indexRegister'])->name('auth.register'); // Mendefinisikan route GET untuk halaman pendaftaran menggunakan metode 'indexRegister' dari AuthController
Route::post('/register', [AuthController::class, 'registerProcess'])->name('auth.register.process'); // Mendefinisikan route POST untuk memproses pendaftaran menggunakan metode 'registerProcess' dari AuthController
Route::get('/login', [AuthController::class, 'indexLogin'])->name('auth.login'); // Mendefinisikan route GET untuk halaman login menggunakan metode 'indexLogin' dari AuthController
Route::post('/login', [AuthController::class, 'loginProcess'])->name('auth.login.process'); // Mendefinisikan route POST untuk memproses login menggunakan metode 'loginProcess' dari AuthController
Route::get('/logout', [AuthController::class, 'logout'])->name('auth.logout'); // Mendefinisikan route GET untuk logout menggunakan metode 'logout' dari AuthController
