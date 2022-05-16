<?php

namespace App\Http\Controllers\Warga;

use App\Models\Warga;
use App\Models\pengaduan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PengaduanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = pengaduan::where('id_rt', '123')->get();
        // $warga =   $warga = Warga::all();
        // var_dump($data);
        // die();
        $title = "Pengaduan";
        return view('warga.pengaduan.pengaduan-warga', compact('title', 'data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $title = 'Tambah Pengaduan';
        return view('warga.pengaduan.pengaduan-warga-tambah', compact('title'));
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
        $data = $request->except('_token');
        $request->validate([
            'judul_pengaduan' => 'required|string',
            'deskripsi_pengaduan' => 'required|string',
            // 'bukti_pengaduan' => 'image|mimes:jpeg,jpg,png'
        ]);
        $data['nik'] = '123';
        $data['id_rt'] = '123';

        // dd($data);
        pengaduan::create($data);
        return redirect()->route('warga.pengaduan.index')->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\pengaduan  $pengaduan
     * @return \Illuminate\Http\Response
     */
    public function show(pengaduan $pengaduan)
    {
        //
        return pengaduan::find($pengaduan);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\pengaduan  $pengaduan
     * @return \Illuminate\Http\Response
     */
    public function edit(pengaduan $pengaduan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\pengaduan  $pengaduan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, pengaduan $pengaduan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\pengaduan  $pengaduan
     * @return \Illuminate\Http\Response
     */
    public function destroy(pengaduan $pengaduan)
    {
        //
    }
}
