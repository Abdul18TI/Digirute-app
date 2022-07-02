<?php

namespace App\Http\Controllers\Warga;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Warga;

class SuratWargaController extends Controller
{
    //
    public function surat_keterangan()
    {
        return view('warga.surat.surat_keterangan_form');
    }

    public function show_pengaju(Request $request)
    {
        // $jenazah= Warga::where('nik', $warga->nik)->first();
        $jenazah = Warga::select('id_warga', 'no_kk', 'nama_lengkap', 'jenis_kelamin', 'pekerjaan', 'agama', 'tempat_lahir', 'tgl_lahir', 'alamat')
            ->where('nik', $request->id)
            ->where('rt', auth()->id())
            ->where('status_warga', 0)
            ->first();
        if ($jenazah) {
            return response()->json(['success' => 'Data ditemukan.', 'data' => $jenazah]);
        }
        return response()->json(['success' => 'Data tidak ditemukan.', 'data' => $jenazah]);
        // dd($jenazah);
    }
}
