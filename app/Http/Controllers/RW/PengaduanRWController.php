<?php

namespace App\Http\Controllers\RW;

use Illuminate\Http\Request;
use App\Models\pengaduan;
use App\Http\Controllers\Controller;

class PengaduanRWController extends Controller
{
    public function index()
    {
        // $pengaduan = Pengaduan::with('kategori_pengaduans')->get();
        // dd($pengaduan);
        $pengaduan = Pengaduan::join(
            'kategori_pengaduan',
            'kategori_pengaduan.id_kategori_pengaduan',
            '=',
            'pengaduans.kategori_pengaduan'
        )
            ->join('wargas', 'wargas.nik', '=', 'pengaduans.nik')
            ->get(['pengaduans.*', 'kategori_pengaduan.nama_kategori_pengaduan', 'wargas.nama_lengkap']);

        return view('RW.pengaduan.tabel_pengaduan', [
            'pengaduan' => $pengaduan,
            "title" => "tabel-pengaduan"
        ]);
    }

    public function show(pengaduan $pengaduan)
    {
        //
        return pengaduan::find($pengaduan);
    }
}
