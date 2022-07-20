<?php

namespace App\Http\Controllers\RW;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Warga;
use App\Models\Kegiatan;
use App\Models\Surat;
use Carbon\Carbon;

class RwController extends Controller
{
    public function home_rw()
    {
        $warga = Warga::all();
        $wargaw = Warga::take(10)->get();
        $wargatetap = Warga::where('jenis_warga', 1)->get();
        $wargadatang = Warga::where('jenis_warga', 0)->get();
        $lk = Warga::where('jenis_kelamin', 1)->count('jenis_kelamin');
        $pr = Warga::where('jenis_kelamin', 2)->count('jenis_kelamin');
        $kk = Warga::distinct()->count('no_kk');
        $kegiatan = Kegiatan::with('Kategori_kegiatans')->take(10)->where('tgl_mulai_kegiatan', '>=', Carbon::now())->where('penanggung_jawab', 'RT')->where('id_penanggung_jawab', auth()->user()->id_rt)->get();
        $surat = Surat::with('wargas')->take(5)->where('status_surat', 0)->latest()->get();
        return view('RW.dashboard.home', [
            "title" => "Dashboard",
            'warga' => $warga,
            'surat' => $surat,
            'wargaw' => $wargaw,
            'wargatetap' => $wargatetap,
            'wargadatang' => $wargadatang,
            'no_kk' => $kk,
            'lk' => $lk,
            'pr' => $pr,
            'kegiatan' => $kegiatan,
        ]);
    }
}
