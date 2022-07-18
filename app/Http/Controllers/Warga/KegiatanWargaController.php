<?php

namespace App\Http\Controllers\Warga;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Kegiatan;

class KegiatanWargaController extends Controller
{
    public function index()
    {
        $rt = auth()->user()->rt;
        $rw = auth()->user()->rt_rel->id_rw;
        $kegiatan = Kegiatan::with(['rts','rws', 'Kategori_kegiatans'])
        ->KegiatanActive()
        ->FilterByRTRW($rt,$rw)
        ->latest()
        ->filter(request(['search', 'category']))
        ->paginate(7)
        ->withQueryString();
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
