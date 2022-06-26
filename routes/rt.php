<?php

use App\Models\Warga;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WargaController;
use App\Http\Controllers\RT\LoginRTController;
use App\Http\Controllers\RT\KegiatanRTController;
use App\Http\Controllers\RT\DashboardRTController;
use App\Http\Controllers\RT\PengaduanRTController;
use App\Http\Controllers\RT\WargaMeninggalController;

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
    Route::get('/status/update', [KegiatanRTController::class, 'updateStatus'])->name('kegiatan.update.status');
    route::resource('kegiatan', KegiatanRTController::class);
    route::get('kematian/show_jenazah', [WargaMeninggalController::class, 'show_warga'])->name('kematian.show_jenazah');
    route::get('kematian/show_warga', [WargaMeninggalController::class, 'show_warga'])->name('kematian.show_pelapor');
    route::get('kematian/{kematian}/print_surat', [WargaMeninggalController::class, 'print'])->name('kematian.print_surat');
    route::resource('kematian', WargaMeninggalController::class);
    Route::prefix('pengaduan')->name('pengaduan.')->group(function () {
        Route::get('/', [PengaduanRTController::class, 'index'])->name('home');
        Route::get('/show/{pengaduan}', [PengaduanRTController::class, 'show'])->name('show');
    });
    Route::get('/test/{id}', function ($id) {
        return Warga::find($id);
    });
    Route::post('logout', [LoginRTController::class, 'logout'])->name('logout');
});
// });