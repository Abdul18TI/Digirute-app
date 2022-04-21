<?php

use App\Http\Controllers\IuranController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PengumumanController;

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

// Route::get('/detail-pengumuman', function () {
//     return view('detail_pengumuman', [
//         "title" => "detail pengumuman"
//     ]);
// })->middleware('auth');

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
Route::get('/detail-iuran/{id}', [IuranController::class, 'detail']);

//route CRUD pengumuman
Route::get('/view-pengumuman', [PengumumanController::class, 'index']);
Route::get('/create-pengumuman', [PengumumanController::class, 'create']);
Route::post('/store-pengumuman', [PengumumanController::class, 'store']);
Route::get('/edit-pengumuman/{id}', [PengumumanController::class, 'edit']);
Route::post('/update-pengumuman', [PengumumanController::class, 'update']);
Route::get('/hapus-pengumuman/{id}', [PengumumanController::class, 'hapus']);
Route::get('/detail-pengumuman/{id}', [PengumumanController::class, 'detail']);
