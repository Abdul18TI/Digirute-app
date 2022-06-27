<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RW\RwController;
use App\Http\Controllers\RW\IuranController;
use App\Http\Controllers\RW\LoginRWController;
use App\Http\Controllers\RW\WargaRWController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\RW\KegiatanController;
use App\Http\Controllers\RW\ProfileRWController;
use App\Http\Controllers\RW\PengumumanController;
use App\Http\Controllers\Admin\KelolaRTController;
use App\Http\Controllers\Admin\KelolaRWController;
use App\Http\Controllers\RW\PengaduanRWController;
use App\Http\Controllers\RW\PembayaranRWController;
use App\Http\Controllers\Admin\JenisIuranController;
use App\Http\Controllers\Admin\KelolaRTRWController;
use App\Http\Controllers\Admin\KategoriKegiatanController;
use App\Http\Controllers\Admin\KategoriPengaduanController;
use App\Http\Controllers\Admin\AgamaController;
use App\Http\Controllers\Admin\KategoriPengumumanController;



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


// Route::view('/coba', 'coba');


// Route::get('/coba', function () {
//     $barang = array('smart-tv', 'iphone', 'mobile-phone', 'laptop', 'canon-camera');
//     return view('coba', [
//         "barang" => $barang
//     ]);
// });
// Route::get('/kelola-rtrw', function () {
//     return view('Admin.kelola_rtrw.kelola_rtrw', [
//         "title" => "Kelola RT/RW"
//     ]);
// });

// Route::get('/login-admin', function () {
//     return view('login_admin', [
//         "title" => "Login Admin"
//     ]);
// });

// Route::get('/c_login_rw', [LoginController::class, 'index'])->name('login')->middleware('guest');
// Route::post('/c_login_rw', [LoginController::class, 'authenticate']);

//route CRUD iuran
// Route::get('/view-iuran', [IuranController::class, 'index']);
// Route::get('/create-iuran', [IuranController::class, 'create']);
// Route::post('/store-iuran', [IuranController::class, 'store']);
// Route::get('/edit-iuran/{id}', [IuranController::class, 'edit']);
// Route::post('/update-iuran', [IuranController::class, 'update']);
// Route::get('/hapus-iuran/{id}', [IuranController::class, 'hapus']);
// Route::get('/detail-iuran/{id}', [IuranController::class, 'detail']);

//contoh penggunana prefix grup dan name
// Route::prefix('user')->name('user.')->middleware(['user', 'auth'])->group(function () {
//     Route::get('dashboard', [UserController::class, 'index'])->name('dashboard');
//     Route::get('profile', [UserController::class, 'profile'])->name('profile');
//     Route::get('setting', [UserController::class, 'setting'])->name('setting');
// });
// Route::middleware(['guest', 'PreventBackHistory'])->group(function () {
//     Route::view('/', 'Warga.login-warga')->name('warga.login');
//     Route::post('/', [LoginWargaController::class, 'authenticate'])->name('login.warga');
// });

Route::get('/', function () {
    return view('Warga.login-warga');
})->name('warga.login')->middleware(['guest:web', 'PreventBackHistory']);


// Route::domain('RT.' . env('APP_URL'))->group(function () {
// Route::get('post/{id}', function ($username, $id) {
//     return 'User ' . $username . ' is trying to read post ' . $id;
// });
// });


// });
//    Route::prefix('RT')
//    ->middleware('web')

//RW
Route::prefix('RW')->name('rw.')->group(function () {
    Route::middleware(['guest:rw', 'PreventBackHistory'])->group(function () {
        Route::view('/', 'RW.login ')->name('login');
        Route::post('/', [LoginRWController::class, 'authenticate'])->name('check-login');
    });
    Route::middleware(['auth:rw', 'PreventBackHistory'])->group(function () {
        Route::get('dashboard', [RWController::class, 'home_rw'])->name('dashboard.home');
        route::resource('pengumuman', PengumumanController::class);
        route::resource('iuran', IuranController::class);
        Route::get('/kegiatan/status/update', [KegiatanController::class, 'updateStatus'])->name('kegiatan.update.status');
        route::resource('kegiatan', KegiatanController::class);
        route::resource('warga', WargaRWController::class);
        route::resource('pengaduan', PengaduanRWController::class);
        route::resource('profile', ProfileRWController::class);
        route::post('pembayaran/store', [PembayaranRWController::class, 'store'])->name("pembayaran.store");
        Route::post('logout', [LoginRWController::class, 'logout'])->name('logout');
        Route::get('/pengumuman/status/update', [PengumumanController::class, 'updateStatus'])->name('pengumuman.update.status');
    });
    // route::resource('pembayaran', PembayaranRWController::class)->except('store');
});

// Route::get('/status/update', [KelolaRTController::class, 'updateStatus'])->name('rt.update.status');


// //Prosedur
// Route::get('/prosedure', function () {
//     return view('prosedure', [
//         "title" => "prosedure"
//     ]);
// });

//Kegiatan warga
// Route::get('/kegiatan-warga', function () {
//     return view('kegiatan_warga', [
//         "title" => "kegiatan-warga"
//     ]);
// });

// Route::get('tabledit/action', 'IuranController@action')->name('tabledit.action');

//Admin
Route::group(['prefix' => 'Admin'], function () {
    Route::get('/', [AdminController::class, 'home_admin'])->name('admin.dashboard.home');
    route::resource('kategori_pengumuman', KategoriPengumumanController::class);
    route::resource('jenis_iuran', JenisIuranController::class);
    route::resource('kategori_kegiatan', KategoriKegiatanController::class);
    route::resource('kategori_pengaduan', KategoriPengaduanController::class);
    route::resource('agama', AgamaController::class);
    route::resource('kelola_rtrw', KelolaRTRWController::class);
    route::resource('rw', KelolaRWController::class);
    route::resource('rt', KelolaRTController::class);
});

// //route kegiatan
// Route::get('/view-kegiatan', function () {
//     return view('RW.Kegiatan.table_kegiatan', [
//         'title' => 'table-kegiatan'
//     ]);
// });

// //route kelahiran
// Route::get('/view-kelahiran', function () {
//     return view('RT.Kelahiran.kelahiran-rt', [
//         'title' => 'table-kelahiran'
//     ]);
// });
// Route::get('/create-kelahiran', function () {
//     return view('RT.kelahiran.kelahiran-tambah-rt', [
//         'title' => 'table-kelahiran'
//     ]);
// });
// Route::get('/create-kematian', function () {
//     return view('RT.kematian.kematian-tambah-rt', [
//         'title' => 'table-kematian'
//     ]);
// });
