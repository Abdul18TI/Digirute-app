<?php

namespace App\Http\Controllers\RT;

use Carbon\Carbon;
use App\Models\pengaduan as Pengaduan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PengaduanRTController extends Controller
{
    //

    public function index()
    {
        $data = Pengaduan::where('id_rt', auth()->guard('rt')->user()->id_rt)->latest()->get();
        // dd($data);
        return view('RT.pengaduan.pengaduan-rt', compact('data'));
    }
    public function show(Pengaduan $pengaduan)
    {
        //
        // dd( pengaduan::find($pengaduan->id_pengaduan));
        // dd($pengaduan->created_at);
        // $current_date_time=Carbon::now();
        // echo $current_date_time;
        // $pengaduan['makan'] = $current_date_time;
        return $pengaduan;
     
    }
    public function tanggapin(Request $request)
    {
        
        //
        // dd( pengaduan::find($pengaduan->id_pengaduan));
        $data = Pengaduan::where('id_pengaduan', $request->id_validasi)
                ->update(['tanggapan_pengaduan' => $request->tanggapan_rt, 'status_pengaduan' => 2, 'ditampilkan' => 1]);
        
        if($data){
            return redirect()->route('rt.pengaduan.home')
            ->with('success', 'Pengaduan telah di validasi!');
        }

        return redirect()->route('rt.pengaduan.home')
        ->with('error', 'Terjadil kegagalan sistem, mohon maaf');
    }

    public function updateStatus(Request $request)
    {
        $pre_status = $request->ditampilkan;
        $status = $request->ditampilkan == 0 ? 1 : 0;

        $pengaduan = Pengaduan::where('id_pengaduan', $request->id_pengaduan)->first();
        $pengaduan->ditampilkan = $pre_status;
        $pengaduan->save();
        return response()->json(['success' => 'Status change successfully.', 'status' => $status, 'pengaduan' => $pengaduan]);
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


