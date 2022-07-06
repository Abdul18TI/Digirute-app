<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\JenisIuran;
use App\Http\Controllers\Controller;

class JenisIuranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jenis_iuran = JenisIuran::all();
        return view('Admin.Kelola_utilitas.jenis_iuran.tabel_jenis_iuran', [
            'jenis_iuran' => $jenis_iuran,
            "title" => "tabel jenis iuran"
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.Kelola_utilitas.jenis_iuran.tambah_jenis_iuran', [
            'title' => 'tambah jenis iuran'
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
            'nama_jenis_iuran' => 'required'
        ]);

        try {
            JenisIuran::create($validatedData);

            return redirect()->route('rt.jenis_iuran.index')
                ->with('success', 'Data berhasil ditambah!');
        } catch (\Exception $e) {
            return redirect()->route('rt.jenis_iuran.index')
                ->with('error', 'Gagal menambahkan data!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(JenisIuran $jenisIuran)
    {
        return view('Admin.Kelola_utilitas.jenis_iuran.edit_jenis_iuran', [
            'jenis_iuran' => $jenisIuran,
            'title' => 'edit-jenis-iuran'
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, jenisIuran $jenisIuran)
    {
        $validatedData = $request->validate([
            'nama_jenis_iuran' => 'required'
        ]);

        jenisIuran::where('id_jenis_iuran', $jenisIuran->id_jenis_iuran)
            ->update($validatedData);
        return redirect()->route('rt.jenis_iuran.index')->with('success', 'Data berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(jenisIuran $jenisIuran)
    {
        try {
            $jenisIuran->delete();
            return redirect()->route('rt.jenis_iuran.index')
                ->with('success', 'data berhasil dihapus!');
        } catch (\Exception $e) {
            return redirect()->route('rt.jenis_iuran.index')
                ->with('error', 'Gagal menghapus data!');
        }
    }
}
