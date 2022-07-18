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
        $rt = auth()->user()->rt;
        $rw = auth()->user()->rt_rel->id_rw;
        // dd($pengumuman[1]->status_pengumuman);
        $pengumuman = Pengumuman::where('status_pengumuman', 1)
            ->PengumumanActive()
            ->FilterByRTRW($rt, $rw)
        ->latest()
        ->filter(request(['search', 'category']))
        ->paginate(7)
        ->withQueryString();
        // dd($pengumuman);
        return view('Warga.pengumuman.pengumuman_warga', [
            'pengumuman' => $pengumuman,
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

    public function filter_kategori_pengumuman($id)
    {
        $pengumuman = Pengumuman::with('Kategori_pengumumans')->where('kategori_pengumuman', $id)->where('status_pengumuman', 1)->latest()->get();
        // dd($pengumuman);
        return view('Warga.pengumuman.kategori_pengumuman_warga', [
            'pengumuman' => $pengumuman,
            'title' => 'kategori-pengumuman'
        ]);
    }
}
