<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\pengaduan;
use App\Http\Controllers\Controller;

class PengaduanRWController extends Controller
{
    public function index()
    {
        $pengaduan = Pengaduan::all();

        return view('RW.pengaduan.tabel_pengaduan', [
            'pengaduan' => $pengaduan,
            "title" => "tabel-pengaduan"
        ]);
    }
}
