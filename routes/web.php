<?php

use App\Http\Controllers\AdministrasiController;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\LaporanAdmController;
use App\Http\Controllers\ObatController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\PoliController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\RegistrasiPasienController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\Admin;
use App\Http\Middleware\Authenticate;
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

Route::middleware(Authenticate::class)->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('dokter/laporan', [DokterController::class, 'laporan'])->name('dokter.laporan');
    Route::get('pasien/laporan', [PasienController::class, 'laporan'])->name('pasien.laporan');
    Route::resource('user', UserController::class)->middleware(Admin::class);
    Route::resource('profil', ProfilController::class);
    //buat middleware dengan perintah php artisan make:middleware Admin lalu modif kodenya \App\Http\Middleware\Admin.php
    Route::resource('poli', PoliController::class)->middleware(Admin::class);
    Route::resource('dokter', DokterController::class)->middleware(Admin::class);
    Route::resource('pasien', PasienController::class)->middleware(Admin::class);
    Route::resource('obat', ObatController::class)->middleware(Admin::class);
    Route::resource('administrasi', AdministrasiController::class);
    Route::get('laporan/administrasi', [LaporanAdmController::class, 'index'])->name('laporan.adm');
});

//membuat route logout
Route::get('logout', function () {
    Auth::logout();
    return redirect('/login');
});

Auth::routes([
    //menghilangkan fungsi register di halaman login
    'register' => false
]);
