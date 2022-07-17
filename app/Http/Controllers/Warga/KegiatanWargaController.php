<?php

namespace App\Http\Controllers\Warga;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Kegiatan;

class KegiatanWargaController extends Controller
{
    public function index()
    {
        // $kegiatan = Kegiatan::with(['rts','rws'])->where('penanggung_jawab', 'RW')->latest()->first();
        $rt = auth()->user()->rt;
        $rw = auth()->user()->rt_rel->id_rw;
       
        // dd($rw);
        $kegiatan = Kegiatan::with(['rts','rws'])
        ->KegiatanActive()
        ->FilterByRTRW($rt,$rw)
        ->latest()
        ->filter(request(['search', 'category']))
        ->paginate(7)
        ->withQueryString();
        // dd($kegiatan); //
        return view('Warga.kegiatan.kegiatan_warga', [
            'kegiatan' => $kegiatan
        ]);
    }

    public function show($id)
    {
        $kegiatan = Kegiatan::where('id_kegiatan', $id)->first();
        return view('Warga.kegiatan.detail_kegiatan_warga', [
            'kegiatan' => $kegiatan,
        ]);
    }
}
