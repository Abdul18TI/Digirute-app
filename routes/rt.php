<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WargaController;
use App\Http\Controllers\KirimEmailController;
use App\Http\Controllers\RT\LoginRTController;
use App\Http\Controllers\RT\SuratRTController;
use App\Http\Controllers\Admin\AgamaController;
use App\Http\Controllers\RT\ProfileRTController;
use App\Http\Controllers\RT\KegiatanRTController;
use App\Http\Controllers\RT\DashboardRTController;
use App\Http\Controllers\RT\PengaduanRTController;
use App\Http\Controllers\RT\PengumumanRTController;
use App\Http\Controllers\Admin\JenisIuranController;
use App\Http\Controllers\RT\WargaMeninggalController;
use App\Http\Controllers\RT\WargaMiskinController;
use App\Http\Controllers\RT\FasilitasUmumRTController;
use App\Http\Controllers\Admin\KategoriKegiatanController;
use App\Http\Controllers\Admin\KategoriPengaduanController;
use App\Http\Controllers\Admin\KategoriPengumumanController;
use App\Http\Controllers\Admin\KategoriFasilitasUmumController;
use App\Http\Controllers\RT\IuranRTController;
use App\Http\Controllers\RT\WargaPindahController;

//  Route::prefix('RT')->name('rt.')->group(function () { 
Route::middleware(['guest:rt', 'PreventBackHistory'])->group(function () {
    Route::view('/', 'RT.login-rt ')->name('login');
    Route::post('/', [LoginRTController::class, 'authenticate'])->name('check-login');
});

Route::middleware(['auth:rt', 'PreventBackHistory'])->group(function () {
    Route::get('/dashboard', [DashboardRTController::class, 'index'])->name('home');
    Route::get('/kirim_email', [KirimEmailController::class, 'kirim']);
    // Route::group(['prefix' => 'warga'], function () {
    // Route::get('/', [WargaController::class, 'home_rt'])->name('warga.home');
    // Route::get('/tambah', [WargaController::class, 'tambah_warga_rt'])->name('warga.tambah');
    // Route::post('/insert', [WargaController::class, 'add'])->name('warga.insert');
    // Route::get('/edit/{warga}', [WargaController::class, 'edit_warga_rt'])->name('warga.edit');
    // Route::put('/update/{id}', [WargaController::class, 'update'])->name('warga.update');
    route::resource('warga', WargaController::class);
    Route::get('/wargat/tetap', [WargaController::class, 'wargatetap'])->name('wargat.tetap');
    Route::get('/wargatt/pendatang', [WargaController::class, 'wargapendatang'])->name('wargatt.pendatang');
    Route::get('/wargak/wargak', [WargaController::class, 'wargak'])->name('wargak.wargak');

    Route::get('/warga/getKab/{id}', function ($id) {
        $kab = App\Models\Kabupaten::where('id_prov', $id)->get();
        return response()->json($kab);
    });
    Route::get('/warga/{idw}/getKab/{id}', function ($idw, $id) {
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

    route::resource('wargapindah', WargaPindahController::class)->only([
        'index', 'create', 'store', 'destroy'
    ]);

    // KEGIATAN
    Route::get('/status/update', [KegiatanRTController::class, 'updateStatus'])->name('kegiatan.update.status');
    route::resource('kegiatan', KegiatanRTController::class);
    // END KEGIATAN

    // PENGUMUMAN
    Route::get('/pengumuman/status2/update', [PengumumanRTController::class, 'updateStatus'])->name('pengumumanrt.update.status');
    route::resource('pengumuman', PengumumanRTController::class);
    // END PENGUMUMAN

    route::resource('fasilitas', FasilitasUmumRTController::class);

    route::resource('profileRT', ProfileRTController::class);

    // KEMATIAN
    route::get('kematian/show_jenazah', [WargaMeninggalController::class, 'show_warga'])->name('kematian.show_jenazah');
    route::get('kematian/show_warga', [WargaMeninggalController::class, 'show_warga'])->name('kematian.show_pelapor');
    route::get('kematian/{kematian}/print_surat', [WargaMeninggalController::class, 'print'])->name('kematian.print_surat');
    route::get('kematian/{kematian}/request_surat', [WargaMeninggalController::class, 'requestSurat'])->name('kematian.request_surat');
    route::resource('kematian', WargaMeninggalController::class)->only([
        'index', 'create', 'store', 'destroy', 'show', 'show_warga', 'requestSurat', 'print'
    ]);
    // END KEMATIAN

    route::resource('kemiskinan', WargaMiskinController::class)->only([
        'index', 'create', 'store', 'destroy', 'show', 'show_warga', 'requestSurat', 'print'
    ]);

    Route::prefix('pengaduan')->name('pengaduan.')->group(function () {
        Route::get('/', [PengaduanRTController::class, 'index'])->name('home');
        Route::get('/show/{pengaduan}', [PengaduanRTController::class, 'show'])->name('show');
        Route::post('/tanggapin', [PengaduanRTController::class, 'tanggapin'])->name('tanggapin');
        Route::get('/ditampilkan', [PengaduanRTController::class, 'updateStatus'])->name('ditampilkan');
    });

    route::get('iuran/show_warga', [IuranRTController::class, 'show_warga'])->name('iuran.show_warga');
    route::get('iuran/{iuran}/pembayaran', [IuranRTController::class, 'pembayaran'])->name('iuran.pembayaran');
    route::post('iuran/pembayaran', [IuranRTController::class, 'storePembayaran'])->name('iuran.storePembayaran');
    route::delete('iuran/pembayaran/{id}', [IuranRTController::class, 'destroyPembayaran'])->name('iuran.destroyPembayaran');
    // Route::get('iuran/{iuran}', [IuranRTController::class, 'pembayaran'])->name('iuran.pembayaran');
    route::resource('iuran', IuranRTController::class);


    Route::prefix('surat')->name('surat.')->group(function () {
        Route::get('/', [SuratRTController::class, 'index'])->name('index');
        Route::get('/nomorsurat', [SuratRTController::class, 'nomorsurat'])->name('nomorsurat');
        Route::get('/surat_keterangan', [SuratRTController::class, 'surat_keterangan'])->name('form.surat_keterangan');
        Route::get('/surat_keterangan/{surat}', [SuratRTController::class, 'detailSuratKeterangan'])->name('detail.surat_keterangan');
        Route::put('/surat_keterangan/{surat}/proses', [SuratRTController::class, 'prosesSurat'])->name('terima.surat_keterangan');
        Route::put('/surat_keterangan/{surat}/tolak', [SuratRTController::class, 'tolakSuratKeterangan'])->name('tolak.surat_keterangan');
        Route::get('/surat_keterangan/{surat}/print_surat', [SuratRTController::class, 'printSuratKeterangan'])->name('print.surat_keterangan');

        Route::get('/detail/{id}', [SuratRTController::class, 'show'])->name('show');
        Route::post('/surat_keterangan/store', [SuratRTController::class, 'surat_keterangan_store'])->name('store.surat_keterangan');
        route::get('/show_pengaju', [SuratRTController::class, 'show_pengaju'])->name('show_pengaju');
        Route::get('cek_surat', [SuratRTController::class, 'cekSurat'])->name('cekSurat');
        Route::post('validasi/qrcode', [SuratRTController::class, 'validasiCode'])->name('validasi_qrcode');
        // Route::get('/show/{pengaduan}', [PengaduanRTController::class, 'show'])->name('show');


    });

    Route::post('logout', [LoginRTController::class, 'logout'])->name('logout');
});

// });