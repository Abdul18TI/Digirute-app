<?php

namespace App\Http\Controllers\RW;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\rw;
use App\Models\Warga;

class ProfileRWController extends Controller
{
    public function index()
    {
        $rw = rw::with('identitas_rw')->first();

        $keluarga = Warga::where('no_kk', $rw->identitas_rw->no_kk)->whereNotIn('nik', [$rw->identitas_rw->nik])->get();
        // dd($keluarga);

        return view('RW.ProfileRW.profile-rw-tes', [
            'rw' => $rw,
            'keluarga' => $keluarga,
            "title" => "tabel-rw"
        ]);
    }

    public function show($id)
    {
        $rw = rw::with('identitas_rw')->where('id_rw', $id)->get();
        // dd($rw);

        return view('RW.ProfileRW.profile-rw', [
            'rw' => $rw,
            "title" => "tabel-rw"
        ]);
    }
}
