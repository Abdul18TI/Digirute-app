<?php

use App\Http\Controllers\IuranController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\WargaController;
use App\Http\Controllers\RW\RwController;
use App\Http\Controllers\RW\PengumumanController;
use App\Http\Controllers\Admin\KategoriPengumumanController;
use App\Http\Controllers\Warga\LoginWargaController;
use App\Http\Controllers\Warga\PengaduanController as WargaPengaduanController;

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



Route::get('/warga', function () {
    return view('warga', [
        "title" => "warga"
    ]);
});

Route::get('/kelola-rtrw', function () {
    return view('kelola_rtrw', [
        "title" => "Kelola RT/RW"
    ]);
});

Route::get('/login-admin', function () {
    return view('login_admin', [
        "title" => "Login Admin"
    ]);
});

// Route::get('/c_login_rw', [LoginController::class, 'index'])->name('login')->middleware('guest');
// Route::post('/c_login_rw', [LoginController::class, 'authenticate']);

//route CRUD iuran
Route::get('/view-iuran', [IuranController::class, 'index']);
Route::get('/create-iuran', [IuranController::class, 'create']);
Route::post('/store-iuran', [IuranController::class, 'store']);
Route::get('/edit-iuran/{id}', [IuranController::class, 'edit']);
Route::post('/update-iuran', [IuranController::class, 'update']);
Route::get('/hapus-iuran/{id}', [IuranController::class, 'hapus']);
Route::get('/detail-iuran/{id}', [IuranController::class, 'detail']);

//contoh penggunana prefix grup dan name
// Route::prefix('user')->name('user.')->middleware(['user', 'auth'])->group(function () {
//     Route::get('dashboard', [UserController::class, 'index'])->name('dashboard');
//     Route::get('profile', [UserController::class, 'profile'])->name('profile');
//     Route::get('setting', [UserController::class, 'setting'])->name('setting');
// });
Route::get('/', function () {
    return view('Warga.login-warga');
})->name('warga.login');
Route::post('/', [LoginWargaController::class, 'authenticate'])->name('login.warga');
Route::post('/logout', [LoginWargaController::class, 'logout'])->name('logout.warga');

Route::prefix('Warga')->middleware('auth')->name('warga.')->group(function () {
    Route::get('/', function () {
        return 'berhasil';
    })->name('home');
    Route::resource('pengaduan', WargaPengaduanController::class);
    // Route::get('/users', function () {
    //     // Route assigned name "admin.users"...
    // })->name('users');

    // Route::get('/', [WargaController::class, 'home_rt'])->name('rt.warga.home');
    // Route::group(['prefix' => 'warga'], function () {
    //     Route::get('/', [WargaController::class, 'home_rt'])->name('rt.warga.home');
    //     Route::get('/tambah', [WargaController::class, 'tambah_warga_rt'])->name('rt.warga.tambah');
    //     Route::post('/insert', [WargaController::class, 'add'])->name('rt.warga.insert');
    //     Route::get('/edit/{warga}', [WargaController::class, 'edit_warga_rt'])->name('rt.warga.edit');
    //     Route::put('/update/{id}', [WargaController::class, 'update'])->name('rt.warga.update');
    // });
});

Route::group(['prefix' => 'RT'], function () {
    Route::get('/', [WargaController::class, 'home_rt'])->name('rt.warga.home');
    Route::group(['prefix' => 'warga'], function () {
        Route::get('/', [WargaController::class, 'home_rt'])->name('rt.warga.home');
        Route::get('/tambah', [WargaController::class, 'tambah_warga_rt'])->name('rt.warga.tambah');
        Route::post('/insert', [WargaController::class, 'add'])->name('rt.warga.insert');
        Route::get('/edit/{warga}', [WargaController::class, 'edit_warga_rt'])->name('rt.warga.edit');
        Route::put('/update/{id}', [WargaController::class, 'update'])->name('rt.warga.update');
    });
});

//RW
Route::group(['prefix' => 'RW'], function () {
    Route::get('/', [RwController::class, 'home_rw'])->name('rw.dashboard.home');
    route::resource('pengumuman', PengumumanController::class);
});

//Admin
Route::group(['prefix' => 'Admin'], function () {
    Route::get('/', [RwController::class, 'home_rw'])->name('rw.dashboard.home');
    route::resource('kategori_pengumuman', KategoriPengumumanController::class);
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
