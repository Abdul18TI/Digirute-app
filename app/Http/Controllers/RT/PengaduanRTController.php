<?php

namespace App\Http\Controllers\RT;

use App\Models\pengaduan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PengaduanRTController extends Controller
{
    //

    public function index()
    {
        $title = "Pengaduan";
        $data = pengaduan::where('id_rt', auth()->guard('rt')->user()->id_rt)->get();
        // dd($data);
        return view('RT.pengaduan.pengaduan-rt', compact('title', 'data'));
    }
    public function show(pengaduan $pengaduan)
    {
        //
        return pengaduan::find($pengaduan);
    }
}
