<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Kategori_fasilitas_umum;
use App\Http\Controllers\Controller;

class KategoriFasilitasUmumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kategori_fasilitas = Kategori_fasilitas_umum::all();
        return view('Admin.Kelola_utilitas.kategori_fasilitas.tabel_kategori_fasilitas', [
            'kategori_fasilitas' => $kategori_fasilitas,
            "title" => "tabel kategori fasilitas"
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.Kelola_utilitas.kategori_fasilitas.tambah_kategori_fasilitas', [
            'title' => 'tambah kategori fasilitas'
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
            'kategori_fasilitas' => 'required'
        ]);

        try {
            Kategori_fasilitas_umum::create($validatedData);

            return redirect()->route('kategori_fasilitas.index')
                ->with('success', 'Data berhasil ditambah!');
        } catch (\Exception $e) {
            return redirect()->route('kategori_fasilitas.index')
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
    public function edit(Kategori_fasilitas_umum $kategori_fasilita)
    {
        // dd($kategori_fasilita);
        return view('Admin.Kelola_utilitas.kategori_fasilitas.edit_kategori_fasilitas', [
            'kategori_fasilitas' => $kategori_fasilita,
            'title' => 'edit-kategori-fasilitas'
        ]);
        // $id = 1

        // $data = Kategori_fasilitas_umum::where('id_kategori_fasilitas', $id);
        // dd($data);
        // return view('Admin.Kelola_utilitas.kategori_fasilitas.edit_kategori_fasilitas', [
        //     'kategori_fasilitas' => $data,
        //     'title' => 'edit-kategori-fasilitas'
        // ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kategori_fasilitas_umum $kategori_fasilita)
    {
        $validatedData = $request->validate([
            'kategori_fasilitas' => 'required'
        ]);

        Kategori_fasilitas_umum::where('id_kategori_fasilitas', $kategori_fasilita->id_kategori_fasilitas)
            ->update($validatedData);
        return redirect()->route('kategori_fasilitas.index')->with('success', 'Data berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kategori_fasilitas_umum $kategori_fasilita)
    {
        try {
            $kategori_fasilita->delete();
            return redirect()->route('kategori_fasilitas.index')
                ->with('success', 'data berhasil dihapus!');
        } catch (\Exception $e) {
            return redirect()->route('kategori_fasilitas.index')
                ->with('error', 'Gagal menghapus data!');
        }
    }
}
