<?php

namespace App\Http\Controllers\Warga;

use App\Models\iuran;
use App\Models\Warga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Pembayaran;

class IuranWargaController extends Controller
{
    //
    public function index()
    {
        $rt =  auth()->user()->rt_rel->first();
        $iuran = Iuran::where('pj_iuran', $rt->id_rt)->get();
        return view('warga.iuran.tabel_iuran', compact('iuran'));
    }

    public function show($id)
    {
        $iuran = Iuran::with('jenis_iurans')->find($id);
        // dd($iuran);
        $warga = Warga::all();
        return view('Warga.iuran.detail_iuran', compact('iuran', 'warga'));
        // return view('RW.Iuran.detail_iuran', [
        //     'iuran' => $iuran,
        //     'warga' => $warga,
        //     'title' => 'detail-iuran'
        // ]);
    }

    public function checkData($id_iuran, $id_warga){
        $pembayaran = Pembayaran::Iuran($id_iuran)->Warga($id_warga)->dd();
        return $pembayaran;
    }
}
