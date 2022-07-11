<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WargaController;
use App\Http\Controllers\RT\LoginRTController;
use App\Http\Controllers\RT\KegiatanRTController;
use App\Http\Controllers\RT\PengumumanRTController;
use App\Http\Controllers\RT\FasilitasUmumRTController;
use App\Http\Controllers\RT\ProfileRTController;
use App\Http\Controllers\RT\DashboardRTController;
use App\Http\Controllers\RT\PengaduanRTController;
use App\Http\Controllers\RT\WargaMeninggalController;
use App\Http\Controllers\Admin\KategoriKegiatanController;
use App\Http\Controllers\Admin\KategoriFasilitasUmumController;
use App\Http\Controllers\Admin\KategoriPengaduanController;
use App\Http\Controllers\Admin\AgamaController;
use App\Http\Controllers\Admin\KategoriPengumumanController;
use App\Http\Controllers\Admin\JenisIuranController;
use App\Http\Controllers\RT\SuratRTController;

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
    Route::get('/warga/getKab/{id}', function ($id) {
        $kab = App\Models\Kabupaten::where('id_prov', $id)->get();
        return response()->json($kab);
    });
    Route::get('/warga/getKec/{id}', function ($id) {
        $kec = App\Models\Kecamatan::where('id_kab', $id)->get();
        return response()->json($kec);
    });
    Route::get('/warga/getKel/{id}', function ($id) {
        $kel = App\Models\Kelurahan::where('id_kec', $id)->get();
        return response()->json($kel);
    });
    route::resource('kategori_pengumuman', KategoriPengumumanController::class);
    route::resource('jenis_iuran', JenisIuranController::class);
    route::resource('kategori_kegiatan', KategoriKegiatanController::class);
    route::resource('kategori_pengaduan', KategoriPengaduanController::class);
    route::resource('kategori_fasilitas', KategoriFasilitasUmumController::class);
    route::resource('agama', AgamaController::class);
    Route::get('/status/update', [KegiatanRTController::class, 'updateStatus'])->name('kegiatan.update.status');
    Route::get('/pengumuman/status2/update', [PengumumanRTController::class, 'updateStatus'])->name('pengumumanrt.update.status');
    route::resource('kegiatan', KegiatanRTController::class);
    route::resource('pengumuman', PengumumanRTController::class);
    route::resource('fasilitasrt', FasilitasUmumRTController::class);
    route::resource('profileRT', ProfileRTController::class);
    route::get('kematian/show_jenazah', [WargaMeninggalController::class, 'show_warga'])->name('kematian.show_jenazah');
    route::get('kematian/show_warga', [WargaMeninggalController::class, 'show_warga'])->name('kematian.show_pelapor');
    route::get('kematian/{kematian}/print_surat', [WargaMeninggalController::class, 'print'])->name('kematian.print_surat');
    route::resource('kematian', WargaMeninggalController::class);
    Route::prefix('pengaduan')->name('pengaduan.')->group(function () {
        Route::get('/', [PengaduanRTController::class, 'index'])->name('home');
        Route::get('/show/{pengaduan}', [PengaduanRTController::class, 'show'])->name('show');
    });
    Route::prefix('surat')->name('surat.')->group(function () {
        Route::get('/', [SuratRTController::class, 'index'])->name('index');
        Route::get('/surat_keterangan', [SuratRTController::class, 'surat_keterangan'])->name('form.surat_keterangan');
        Route::get('/surat_keterangan/{surat}', [SuratRTController::class, 'detailSuratKeterangan'])->name('detail.surat_keterangan');
        Route::put('/surat_keterangan/{surat}/proses', [SuratRTController::class, 'prosesSurat'])->name('terima.surat_keterangan');
        Route::put('/surat_keterangan/{surat}/tolak', [SuratRTController::class, 'tolakSuratKeterangan'])->name('tolak.surat_keterangan');
        Route::get('/surat_keterangan/{id}/print_surat', [SuratRTController::class, 'print'])->name('print.surat_keterangan');
      
        Route::get('/detail/{id}', [SuratRTController::class, 'show'])->name('show');
        Route::post('/surat_keterangan/store', [SuratRTController::class, 'surat_keterangan_store'])->name('store.surat_keterangan');
        route::get('/show_pengaju', [SuratRTController::class, 'show_pengaju'])->name('show_pengaju');
        // Route::get('/show/{pengaduan}', [PengaduanRTController::class, 'show'])->name('show');
        
    });
    Route::post('logout', [LoginRTController::class, 'logout'])->name('logout');
});

// });