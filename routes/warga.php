<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Warga\OtherController;
use App\Http\Controllers\Warga\IuranWargaController;
use App\Http\Controllers\Warga\LoginWargaController;
use App\Http\Controllers\Warga\DashboardWargaController;
use App\Http\Controllers\Warga\PengaduanController as WargaPengaduanController;
use App\Http\Controllers\Warga\KegiatanWargaController;
use App\Http\Controllers\Warga\PengumumanWargaController;
use App\Http\Controllers\Warga\FasilitasWargaController;
use App\Http\Controllers\Warga\ProfileWargaController;
use App\Http\Controllers\Warga\SuratWargaController;

// Route::prefix('Warga')->name('warga.')->group(function () {
Route::middleware(['guest', 'PreventBackHistory'])->group(function () {
    // Route::view('/', 'Warga.login-warga ');
    Route::post('/', [LoginWargaController::class, 'authenticate'])->name('check-login');
});
Route::middleware(['auth', 'PreventBackHistory'])->group(function () {
    Route::get('/', [DashboardWargaController::class, 'index'])->name('home');
    Route::get('pengaduan/pribadi', [WargaPengaduanController::class, 'pengaduan_pribadi'])->name('pengaduan.pribadi');
    Route::get('/persyaratan', function () {
        // Route assigned name "admin.users"...
        return view('warga.prosedure');
    })->name('persyaratan');
    Route::resource('pengaduan', WargaPengaduanController::class);
    Route::resource('kegiatan_warga', KegiatanWargaController::class);
    Route::resource('pengumuman_warga', PengumumanWargaController::class);
    Route::resource('fasilitaswarga', FasilitasWargaController::class);
    Route::resource('profilewarga', ProfileWargaController::class);
    Route::get('/kategori_pengumuman/{id}', [PengumumanWargaController::class, 'filter_kategori_pengumuman'])->name('filter_kategori');
    Route::get('/rw-rt', [OtherController::class, 'rtrw'])->name('rw-rt');
    Route::prefix('iuran')->name('iuran.')->group(function () {
        Route::get('/', [IuranWargaController::class, 'index'])->name('home');
        Route::get('/detail/{id}', [IuranWargaController::class, 'show'])->name('show');
        // Route::get('/show/{pengaduan}', [PengaduanRTController::class, 'show'])->name('show');
    });
    Route::post('logout', [LoginWargaController::class, 'logout'])->name('logout');
    Route::get('getKab/{id}', function ($id) {
        $kab = App\Models\Kabupaten::where('id_prov', $id)->get();
        return response()->json($kab)->name('getkab');
    });
    Route::prefix('surat')->name('surat.')->group(function () {
        Route::get('/', [SuratWargaController::class, 'index'])->name('index');
        Route::delete('/{surat}', [SuratWargaController::class, 'destroy'])->name('destroy');
        Route::get('/surat_keterangan', [SuratWargaController::class, 'surat_keterangan'])->name('form.surat_keterangan');
        Route::get('/surat_keterangan/{id}/print_surat', [SuratWargaController::class, 'print'])->name('print.surat_keterangan');
        Route::get('/detail/{id}', [SuratWargaController::class, 'show'])->name('show');
        Route::post('/surat_keterangan/store', [SuratWargaController::class, 'surat_keterangan_store'])->name('store.surat_keterangan');
        route::get('/show_pengaju', [SuratWargaController::class, 'show_pengaju'])->name('show_pengaju');
        Route::post('validasi/qrcode', [SuratWargaController::class, 'validasiCode'])->name('validasi_qrcode');
        // Route::get('/show/{pengaduan}', [PengaduanRTController::class, 'show'])->name('show');
    });
});





// });
