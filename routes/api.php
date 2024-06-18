<?php

use Illuminate\Http\Request; // Mengimpor kelas Request dari Illuminate\Http
use Illuminate\Support\Facades\Route; // Mengimpor facade Route dari Illuminate\Support\Facades

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
// Mendefinisikan route yang menggunakan middleware 'auth:sanctum' untuk autentikasi
Route::middleware('auth:sanctum')->get('/user', function (Request $request) { 
    return $request->user(); // Mengembalikan data pengguna yang sedang terautentikasi
});
