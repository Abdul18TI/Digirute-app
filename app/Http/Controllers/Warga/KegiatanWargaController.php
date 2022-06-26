<?php

namespace App\Http\Controllers\Warga;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Kegiatan;

class KegiatanWargaController extends Controller
{
    public function index()
    {
        // dd(request('search'));
        // $kegiatan = Kegiatan::where('status_kegiatan', 1)->latest()->get();
        // dd($kegiatan[1]->status_kegiatan);

        return view('Warga.kegiatan.kegiatan_warga', [
            'kegiatan' => Kegiatan::where('status_kegiatan', 1)->latest()->filter(request(['search']))->get(),
            "title" => "kegiatan-warga"
        ]);
    }

    public function show($id)
    {
        $kegiatan = Kegiatan::where('id_kegiatan', $id)->first();
        // dd($rw);

        return view('Warga.kegiatan.detail_kegiatan_warga', [
            'kegiatan' => $kegiatan,
            "title" => "kegiatan-warga"
        ]);
    }
}
