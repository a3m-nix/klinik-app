<?php

use App\Http\Controllers\AdministrasiController;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\RegistrasiPasienController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [RegistrasiPasienController::class, 'create']);
Route::resource('registrasipasien', RegistrasiPasienController::class);

Route::get('dokter/laporan', [DokterController::class, 'laporan'])->name('dokter.laporan');
Route::get('pasien/laporan', [PasienController::class, 'laporan'])->name('pasien.laporan');

Route::resource('dokter', DokterController::class);
Route::resource('pasien', PasienController::class);
Route::resource('administrasi', AdministrasiController::class);
/* 
Route::get('/', function () {
    return view('welcome');
}); */

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
