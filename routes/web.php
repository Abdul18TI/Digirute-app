<?php

use App\Http\Controllers\RW\IuranController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RW\RwController;
use App\Http\Controllers\WargaController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\RW\PengumumanController;
use App\Http\Controllers\RW\KegiatanController;
use App\Http\Controllers\Admin\KategoriPengumumanController;
use App\Http\Controllers\Admin\KategoriKegiatanController;
use App\Http\Controllers\Admin\JenisIuranController;



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
//     return view('kelola_rtrw', [
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

//RW
Route::group(['prefix' => 'RW'], function () {
    Route::get('/', [RWController::class, 'home_rw'])->name('rw.dashboard.home');
    route::resource('pengumuman', PengumumanController::class);
    route::resource('iuran', IuranController::class);
    route::resource('kegiatan', kegiatanController::class);
    route::resource('warga', WargaController::class);
});

//Admin
Route::group(['prefix' => 'Admin'], function () {
    Route::get('/', [AdminController::class, 'home_admin'])->name('admin.dashboard.home');
    route::resource('kategori_pengumuman', KategoriPengumumanController::class);
    route::resource('jenis_iuran', JenisIuranController::class);
    route::resource('kategori_kegiatan', KategoriKegiatanController::class);
});

//route kegiatan
Route::get('/view-kegiatan', function () {
    return view('RW.Kegiatan.table_kegiatan', [
        'title' => 'table-kegiatan'
    ]);
});

//route kelahiran
Route::get('/view-kelahiran', function () {
    return view('RT.Kelahiran.kelahiran-rt', [
        'title' => 'table-kelahiran'
    ]);
});
Route::get('/create-kelahiran', function () {
    return view('RT.kelahiran.kelahiran-tambah-rt', [
        'title' => 'table-kelahiran'
    ]);
});
Route::get('/create-kematian', function () {
    return view('RT.kematian.kematian-tambah-rt', [
        'title' => 'table-kematian'
    ]);
});
