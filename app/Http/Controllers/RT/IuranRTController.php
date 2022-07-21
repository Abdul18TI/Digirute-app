<?php

namespace App\Http\Controllers\RT;

use App\Models\Iuran;
use App\Models\JenisIuran;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IuranRTController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $iuran = Iuran::where('pj_iuran', auth()->user()->id_rt)->get();
        return view('RT.Iuran.tabel_iuran', [
            'iuran' => $iuran,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jenis_iuran = JenisIuran::all();
        return view('RT.Iuran.tambah_iuran', [
            'jenis_iuran' => $jenis_iuran,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'judul_iuran' => 'required',
            'jenis_iuran' => 'required',
            'jumlah_iuran' => 'Integer',
            'target_iuran' => 'Integer',
            'tgl_mulai_iuran' => 'required',
            'tgl_akhir_iuran' => 'required',
            'deskripsi_iuran' => 'required'
        ]);

        $validatedData['pj_iuran'] = 1;
        $validatedData['status_iuran'] = 1;

        try {
            Iuran::create($validatedData);

            return redirect()->route('rt.iuran.index')
            ->with('success', 'Data berhasil ditambah!');
        } catch (\Exception $e) {
            return redirect()->route('rt.iuran.index')
            ->with('error', 'Gagal menambahkan data!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Iuran  $iuran
     * @return \Illuminate\Http\Response
     */
    public function show(Iuran $iuran)
    {
        return view('rt.iuran.detail_iuran', [
            'iuran' => $iuran,
            'jenis_iuran' => JenisIuran::all(),
        ]);
    }

    public function edit(Iuran $iuran)
    {
        return view('rt.Iuran.edit_iuran', [
            'iuran' => $iuran,
            'jenis_iuran' => JenisIuran::all(),
        ]);
    }

    public function update(Request $request, Iuran $iuran)
    {
        $validatedData = $request->validate([
            'judul_iuran' => 'required',
            'jenis_iuran' => 'required',
            'jumlah_iuran' => 'Integer',
            'target_iuran' => 'Integer',
            'tgl_mulai_iuran' => 'required',
            'tgl_akhir_iuran' => 'required',
            'deskripsi_iuran' => 'required'
        ]);

        $validatedData['pj_iuran'] = 1;
        $validatedData['status_iuran'] = 1;

        iuran::where('id_iuran', $iuran->id_iuran)
            ->update($validatedData);

        return redirect()->route('rt.iuran.index')->with('success', 'Data berhasil diubah!');
    }

    public function destroy(Iuran $iuran)
    {
        try {
            $iuran->delete();
            return redirect()->route('rt.iuran.index')
            ->with('success', 'data berhasil dihapus!');
        } catch (\Exception $e) {
            return redirect()->route('rt.iuran.index')
            ->with('error', 'Gagal menghapus data!');
        }
    }
}
