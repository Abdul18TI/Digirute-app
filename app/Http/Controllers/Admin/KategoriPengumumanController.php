<?php

namespace App\Http\Controllers\Admin;

use App\Models\KategoriPengumuman;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class KategoriPengumumanController extends Controller
{

    public function index()
    {
        $kategori_pengumuman = KategoriPengumuman::all();
        return view('Admin.Kelola_utilitas.kategori_pengumuman.tabel_kategori_pengumuman', [
            'kategori_pengumuman' => $kategori_pengumuman,
            "title" => "tabel kategori pengumuman"
        ]);
    }

    public function create()
    {
        return view('Admin.Kelola_utilitas.kategori_pengumuman.tambah_kategori_pengumuman', [
            'title' => 'tambah-kategori pengumuman'
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_kategori_pengumuman' => 'required'
        ]);

        try {
            KategoriPengumuman::create($validatedData);

            return redirect()->route('rt.kategori_pengumuman.index')
                ->with('success', 'Data berhasil ditambah!');
        } catch (\Exception $e) {
            return redirect()->route('rt.kategori_pengumuman.index')
                ->with('error', 'Gagal menambahkan data!');
        }
    }

    public function edit(KategoriPengumuman $kategoriPengumuman)
    {
        return view('Admin.Kelola_utilitas.kategori_pengumuman.edit_kategori_pengumuman', [
            'kategori_pengumuman' => $kategoriPengumuman,
            'title' => 'edit-kategori-pengumuman'
        ]);
    }

    public function update(Request $request, KategoriPengumuman $kategoriPengumuman)
    {
        $validatedData = $request->validate([
            'nama_kategori_pengumuman' => 'required'
        ]);

        KategoriPengumuman::where('id_kategori_pengumuman', $kategoriPengumuman->id_kategori_pengumuman)
            ->update($validatedData);
        return redirect()->route('rt.kategori_pengumuman.index')->with('success', 'Data berhasil diubah!');
    }

    public function destroy(KategoriPengumuman $kategoriPengumuman)
    {
        try {
            $kategoriPengumuman->delete();
            return redirect()->route('rt.kategori_pengumuman.index')
                ->with('success', 'data berhasil dihapus!');
        } catch (\Exception $e) {
            return redirect()->route('rt.kategori_pengumuman.index')
                ->with('error', 'Gagal menghapus data!');
        }

        // dd($kategoriPengumuman->delete());
    }
}
