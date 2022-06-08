<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Warga\OtherController;
use App\Http\Controllers\RT\PengaduanRTController;
use App\Http\Controllers\Warga\IuranWargaController;
use App\Http\Controllers\Warga\LoginWargaController;
use App\Http\Controllers\Warga\DashboardWargaController;
use App\Http\Controllers\Warga\PengaduanController as WargaPengaduanController;

// Route::prefix('Warga')->name('warga.')->group(function () {
Route::middleware(['guest', 'PreventBackHistory'])->group(function () {
    // Route::view('/', 'Warga.login-warga ');
    Route::post('/', [LoginWargaController::class, 'authenticate'])->name('check-login');
});
Route::middleware(['auth', 'PreventBackHistory'])->group(function () {
    Route::get('/', [DashboardWargaController::class, 'index'])->name('home');
    Route::get('pengaduan/pribadi', [WargaPengaduanController::class, 'pengaduan_pribadi'])->name('pengaduan.pribadi');
Route::resource('pengaduan', WargaPengaduanController::class);
    Route::get('/rw-rt', [OtherController::class, 'rtrw'])->name('rw-rt');
    Route::prefix('iuran')->name('iuran.')->group(function () {
        Route::get('/', [IuranWargaController::class, 'index'])->name('home');
        Route::get('/detail/{id}', [IuranWargaController::class, 'show'])->name('show');
        // Route::get('/show/{pengaduan}', [PengaduanRTController::class, 'show'])->name('show');
    });
    Route::post('logout', [LoginWargaController::class, 'logout'])->name('logout');
});

    // Route::get('/users', function () {
    //     // Route assigned name "admin.users"...
    // })->name('users');
// });
