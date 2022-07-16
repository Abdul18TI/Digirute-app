<?php

namespace App\Http\Controllers\Warga;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Kegiatan;

class KegiatanWargaController extends Controller
{
    public function index()
    {
        $kegiatan = Kegiatan::where('status_kegiatan', 1)->latest()->filter(request(['search', 'category']))->paginate(7)->withQueryString();
        return view('Warga.kegiatan.kegiatan_warga', [
            'kegiatan' => $kegiatan
        ]);
    }

    public function show($id)
    {
        $kegiatan = Kegiatan::where('id_kegiatan', $id)->first();
        return view('Warga.kegiatan.detail_kegiatan_warga', [
            'kegiatan' => $kegiatan,
            "title" => "kegiatan-warga"
        ]);
    }
}
