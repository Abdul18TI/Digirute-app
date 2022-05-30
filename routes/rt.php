<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WargaController;
use App\Http\Controllers\RT\DashboardRTController;
use App\Http\Controllers\RT\PengaduanRTController;

use App\Http\Controllers\RT\LoginRTController;
//  Route::prefix('RT')->name('rt.')->group(function () { 
Route::middleware(['guest:rt', 'PreventBackHistory'])->group(function () {
    Route::view('/', 'RT.login-rt ')->name('login');
    Route::post('/', [LoginRTController::class, 'authenticate'])->name('check-login');
});

Route::middleware(['auth:rt', 'PreventBackHistory'])->group(function () {
    Route::get('/dashboard', [DashboardRTController::class, 'index'])->name('home');
    // Route::group(['prefix' => 'warga'], function () {
    // Route::get('/', [WargaController::class, 'home_rt'])->name('warga.home');
    // Route::get('/tambah', [WargaController::class, 'tambah_warga_rt'])->name('warga.tambah');
    // Route::post('/insert', [WargaController::class, 'add'])->name('warga.insert');
    // Route::get('/edit/{warga}', [WargaController::class, 'edit_warga_rt'])->name('warga.edit');
    // Route::put('/update/{id}', [WargaController::class, 'update'])->name('warga.update');
    route::resource('warga', WargaController::class);
    // });
    Route::prefix('pengaduan')->name('pengaduan.')->group(function () {
        Route::get('/', [PengaduanRTController::class, 'index'])->name('home');
        Route::get('/show/{pengaduan}', [PengaduanRTController::class, 'show'])->name('show');
    });
    Route::post('logout', [LoginRTController::class, 'logout'])->name('logout');
});
// });