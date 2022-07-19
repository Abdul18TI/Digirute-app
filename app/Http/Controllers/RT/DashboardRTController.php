<?php

namespace App\Http\Controllers\RT;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Warga;
use App\Models\Kegiatan;


class DashboardRTController extends Controller
{
    //
    public function index()
    {
        $warga = Warga::all();
        $wargaw = Warga::take(10)->get();
        $wargatetap = Warga::where('jenis_warga', 1)->get();
        $wargadatang = Warga::where('jenis_warga', 0)->get();
        $kk = Warga::distinct()->count('no_kk');
        $kegiatan = Kegiatan::all();
        // dd($kk);
        // return '<pre>' . auth()->guard('rt')->user() . '</pre>';
        return view(
            'RT.dashboard-rt',
            [
                'warga' => $warga,
                'wargaw' => $wargaw,
                'wargatetap' => $wargatetap,
                'wargadatang' => $wargadatang,
                'no_kk' => $kk,
                'kegiatan' => $kegiatan,
            ]
        );
    }
}
