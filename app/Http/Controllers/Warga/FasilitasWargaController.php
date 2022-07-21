<?php

namespace App\Http\Controllers\Warga;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Fasilitas_umum;

class FasilitasWargaController extends Controller
{
    public function index()
    {
        $fasilitas = Fasilitas_umum::where('status_fasilitas', 1)->latest()->filter(request(['search', 'category']))->paginate(7)->withQueryString();
        return view('Warga.fasilitas.fasilitas_warga', [
            'fasilitas' => $fasilitas,
            "title" => "Fasilitas_umum"
        ]);
    }

    public function show($id)
    {
        $fasilitas = Fasilitas_umum::where('id_fasilitas_umum', $id)->first();
        return view('Warga.fasilitas.detail_fasilitas', [
            'fasilitas' => $fasilitas,
            "title" => "fasilitas-warga"
        ]);
    }
}
