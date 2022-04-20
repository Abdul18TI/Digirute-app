<?php

use App\Http\Controllers\IuranController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;

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

Route::get('/tabel-iuran', function () {
    return view('tabel_iuran', [
        "title" => "tabel iuran"
    ]);
});

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
Route::get('/tambah-iuran', [IuranController::class, 'create']);
