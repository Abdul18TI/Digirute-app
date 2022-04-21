<?php

use App\Http\Controllers\IuranController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\WargaController;

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

Route::get('/', function () {
    return view('home', [
        "title" => "home"
    ]);
});

Route::get('/warga', function () {
    return view('warga', [
        "title" => "warga"
    ]);
});

Route::get('/tambah-pengumuman', function () {
    return view('tambah_pengumuman', [
        "title" => "tambah pengumuman"
    ]);
});

Route::get('/tabel-pengumuman', function () {
    return view('tabel_pengumuman', [
        "title" => "tabel pengumuman"
    ]);
});

Route::get('/detail-pengumuman', function () {
    return view('detail_pengumuman', [
        "title" => "detail pengumuman"
    ]);
})->middleware('auth');

Route::get('/detail-iuran', function () {
    return view('detail_iuran', [
        "title" => "detail iuran"
    ]);
});

Route::get('/kelola-rtrw', function () {
    return view('kelola_rtrw', [
        "title" => "Kelola RT/RW"
    ]);
});

Route::get('/kelola-utilitas', function () {
    return view('kelola_utilitas', [
        "title" => "Kelola Utilitas"
    ]);
});

Route::get('/login-admin', function () {
    return view('login_admin', [
        "title" => "Login Admin"
    ]);
});

Route::get('/c_login_rw', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/c_login_rw', [LoginController::class, 'authenticate']);

//route CRUD iuran
Route::get('/view-iuran', [IuranController::class, 'index']);
Route::get('/create-iuran', [IuranController::class, 'create']);
Route::post('/store-iuran', [IuranController::class, 'store']);
Route::get('/edit-iuran/{id}', [IuranController::class, 'edit']);
Route::post('/update-iuran', [IuranController::class, 'update']);
Route::get('/hapus-iuran/{id}', [IuranController::class, 'hapus']);
// Route::get('/detail-iuran/{id}', [IuranController::class, 'detail']);


Route::group(['prefix'=>'RT'], function(){
    Route::group(['prefix'=>'warga'], function(){
        Route::get('/',[WargaController::class,'home_rt'])->name('rt.warga.home');
        Route::get('/tambah',[WargaController::class,'tambah_warga_rt'])->name('rt.warga.tambah');
        Route::post('/insert',[WargaController::class,'add'])->name('rt.warga.insert');
        Route::get('/edit/{id}',[WargaController::class,'edit'])->name('rt.warga.edit');
        Route::put('/update/{id}',[WargaController::class,'update'])->name('rt.warga.update');
        
    });
});