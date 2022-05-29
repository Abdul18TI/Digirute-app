<?php

namespace App\Http\Controllers\Warga;

use App\Http\Controllers\Controller;
use App\Models\rt;
use App\Models\rw;
use App\Models\Warga;
use Illuminate\Http\Request;

class OtherController extends Controller
{
    //
    public function rtrw()
    {
        // $warga = Warga::with('rt_rel')->first();
        // $warga = warga::with('rt_rel.rw_rel')->get();
        // $title = "Profile RT RW";
        $rt =  auth()->user()->rt_rel->first();
        // $rt_test =  auth()->user()->rt_rel->identitas_rt->first();
        $rw = auth()->user()->rt_rel->rw_rel->first();
        return view('Warga.rt-rw', compact('rt', 'rw'));
        // return view('Warga.pengaduan.coba');
    }
}
