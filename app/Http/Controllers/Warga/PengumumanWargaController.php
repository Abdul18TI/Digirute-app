<?php

namespace App\Http\Controllers\Warga;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Pengumuman;

class PengumumanWargaController extends Controller
{
    public function index()
    {
        // dd(request('search'));
        // $pengumuman = Pengumuman::where('status_pengumuman', 1)->latest()->get();
        // dd($pengumuman[1]->status_pengumuman);

        return view('Warga.pengumuman.pengumuman_warga', [
            'pengumuman' => Pengumuman::where('status_pengumuman', 1)->latest()->filter(request(['search']))->get(),
            "title" => "pengumuman-warga"
        ]);
    }

    public function show($id)
    {
        $pengumuman = Pengumuman::where('id_pengumuman', $id)->first();
        // dd($rw);

        return view('Warga.pengumuman.detail_pengumuman_warga', [
            'pengumuman' => $pengumuman,
            "title" => "pengumuman-warga"
        ]);
    }
}
