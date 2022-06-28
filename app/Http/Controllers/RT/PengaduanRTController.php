<?php

namespace App\Http\Controllers\RT;

use Carbon\Carbon;
use App\Models\pengaduan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PengaduanRTController extends Controller
{
    //

    public function index()
    {
        $data = pengaduan::where('id_rt', auth()->guard('rt')->user()->id_rt)->get();
        // dd($data);
        return view('RT.pengaduan.pengaduan-rt', compact('data'));
    }
    public function show(pengaduan $pengaduan)
    {
        //
        // dd( pengaduan::find($pengaduan->id_pengaduan));
        // dd($pengaduan->created_at);
        // $current_date_time=Carbon::now();
        // echo $current_date_time;
        // $pengaduan['makan'] = $current_date_time;
        return $pengaduan;
     
    }
    public function test(pengaduan $pengaduan)
    {
        //
        // dd( pengaduan::find($pengaduan->id_pengaduan));
        // dd($pengaduan->warga);
        $data = $pengaduan;
        return view('RT.test', compact('data'));
    }
}


