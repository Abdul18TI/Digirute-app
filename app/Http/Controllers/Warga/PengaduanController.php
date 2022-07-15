<?php

namespace App\Http\Controllers\Warga;

use App\Models\Warga;
use App\Models\pengaduan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\KategoriPengaduan;
use Illuminate\Support\Facades\Auth;

class PengaduanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd(Auth::user()->load(['rt_rel'])->rt_rel->ketua_rt);
        // dd(Auth::user()->rt_rel->ketua_rt);
        // dd();
        $data = pengaduan::ShowOn()->where('id_rt', auth()->user()->rt)->get();
       
        return view('warga.pengaduan.pengaduan-warga', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $pengaduan = KategoriPengaduan::get();
        return view('warga.pengaduan.pengaduan-warga-tambah', compact('pengaduan'));
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
        $data = $request->validate([
            'judul_pengaduan' => 'required|string',
            'deskripsi_pengaduan' => 'required|string',
            'kategori_pengaduan' => 'required',
            'bukti_pengaduan' => 'image|mimes:jpeg,jpg,png'
        ]);
        $data['nik'] = auth()->user()->nik;
        $data['id_rt'] = auth()->user()->rt;
        //untuk mengecek apakah ada inputan gambar, jika ada gambar akan disimpan
        if ($request->file('bukti_pengaduan')) {
            $custom_file_name = time() . '-' . $request->file('bukti_pengaduan')->getClientOriginalName();
            $data['bukti_pengaduan'] = $request->file('bukti_pengaduan')->storeAs('gambar-pengduan-warga', $custom_file_name);
        }

        pengaduan::create($data);
        return redirect()->route('warga.pengaduan.index')->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\pengaduan  $pengaduan
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = pengaduan::find($id);
        return $data;
    }

    public function pengaduan_pribadi()
    {
        $data = pengaduan::where('id_rt', auth()->user()->rt)
            ->where('nik', auth()->user()->nik)
            ->get();
        return view('warga.pengaduan.pengaduan-warga-pribadi', compact('data'));
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
