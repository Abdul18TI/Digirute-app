<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Agama;
use App\Http\Controllers\Controller;

class AgamaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $agama = Agama::all();
        return view('Admin.Kelola_utilitas.agama.tabel_agama', [
            'agama' => $agama,
            "title" => "tabel agama"
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.Kelola_utilitas.agama.tambah_agama', [
            'title' => 'tambah agama'
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
            'agama' => 'required'
        ]);

        try {
            Agama::create($validatedData);

            return redirect()->route('agama.index')
                ->with('success', 'Data berhasil ditambah!');
        } catch (\Exception $e) {
            return redirect()->route('agama.index')
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
    public function edit(Agama $agama)
    {
        // dd($agama->agama);
        return view('Admin.Kelola_utilitas.agama.edit_agama', [
            'agama' => $agama,
            'title' => 'edit-agama'
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Agama $agama)
    {
        $validatedData = $request->validate([
            'agama' => 'required'
        ]);

        Agama::where('id_agama', $agama->id_agama)
            ->update($validatedData);
        return redirect()->route('agama.index')->with('success', 'Data berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Agama $agama)
    {
        try {
            $agama->delete();
            return redirect()->route('agama.index')
                ->with('success', 'data berhasil dihapus!');
        } catch (\Exception $e) {
            return redirect()->route('agama.index')
                ->with('error', 'Gagal menghapus data!');
        }
    }
}
