<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/login', function () {
    return view('login', [
        "title" => "login"
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
