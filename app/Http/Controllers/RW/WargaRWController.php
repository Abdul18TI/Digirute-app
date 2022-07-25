<?php

namespace App\Http\Controllers\RW;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Warga;
use App\Models\Pekerjaan;
use App\Models\WargaMiskin as Kemiskinan;

class WargaRWController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $warga = Warga::where('status_warga', 0)->get();

        return view('RW.Warga.tabel_warga', [
            'warga' => $warga,
            "title" => "tabel-warga"
        ]);
    }

    public function wargatetaprw()
    {
        $warga = Warga::where('status_warga', 0)->where('jenis_warga', 1)->get();
        // $warga = Warga::find(1);
        // dd($warga);
        return view(
            'RW.warga.warga-rw-tetap',
            [
                'warga' => $warga,
            ]
        );
    }

    public function wargapendatangrw()
    {
        $warga = Warga::where('status_warga', 0)->where('jenis_warga', 0)->get();
        // $warga = Warga::find(1);
        // dd($warga);
        return view(
            'RW.warga.warga-rw-pendatang',
            [
                'warga' => $warga,
            ]
        );
    }

    public function wargakkrw()
    {
        $warga = Warga::where('status_warga', 0)->where('status_hubungan_dalam_keluarga', 1)->get();
        // $warga = Warga::find(1);
        // dd($warga);
        return view(
            'RW.warga.warga-rw-kepala',
            [
                'warga' => $warga,
            ]
        );
    }

    public function wargamrw()
    {
        $kemiskinan = Kemiskinan::all();
        // $warga = Warga::find(1);
        // dd($warga);
        return view(
            'RW.warga.tabel_kemiskinan_rw',
            [
                'kemiskinan' => $kemiskinan,
            ]
        );
    }

    public function wargamrwd($id)
    {
        $kemiskinan = Kemiskinan::where('id', $id)->first();
        // dd($kemiskinan);
        return view(
            'RW.warga.detail_kemiskinan_rw',
            [
                'kemiskinan' => $kemiskinan,
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $warga = Warga::with(['identitas_rws', 'rt_rel', 'pekerjaan', 'agamas', 'pendidikans', 'kelurahans', 'kecamatans', 'kabupatens', 'provinsis', 'hubungans', 'golongan_darahs'])->where('id_warga', $id)->first();
        // dd($warga);

        return view('RW.Warga.detail_warga', [
            'warga' => $warga,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
