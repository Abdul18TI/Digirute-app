<?php

namespace App\Http\Controllers\Warga;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Fasilitas_umum;

class FasilitasWargaController extends Controller
{
    public function index()
    {
        // dd(request('search'));
        // $fasilitas = Fasilitas_umum::where('status_fasilitas', 1)->latest()->get();
        // dd($fasilitas[1]->status_fasilitas);

        return view('Warga.fasilitas.fasilitas_warga', [
            'fasilitas' => Fasilitas_umum::where('status_fasilitas', 1)->latest()->filter(request(['search', 'category']))->paginate(7)->withQueryString(),
            "title" => "Fasilitas_umum"
        ]);
    }

    public function show($id)
    {
        $fasilitas = Fasilitas_umum::where('id_fasilitas', $id)->first();
        // dd($rw);

        return view('Warga.fasilitas.detail_fasilitas_warga', [
            'fasilitas' => $fasilitas,
            "title" => "fasilitas-warga"
        ]);
    }
}
