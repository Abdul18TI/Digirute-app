<?php

namespace App\Http\Controllers\Warga;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\iuran;
use App\Models\Warga;


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
        $iuran = Iuran::fInd($id);
        $warga = Warga::all();
        return view('Warga.iuran.detail_iuran', compact('iuran', 'warga'));
        // return view('RW.Iuran.detail_iuran', [
        //     'iuran' => $iuran,
        //     'warga' => $warga,
        //     'title' => 'detail-iuran'
        // ]);
    }
}
