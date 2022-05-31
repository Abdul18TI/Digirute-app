<?php

namespace App\Http\Controllers\Admin;

use App\Models\KategoriKegiatan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class KategoriKegiatanController extends Controller
{
    public function index()
    {
        $kategori_kegiatan = KategoriKegiatan::all();
        return view('Admin.Kelola_utilitas.kategori_kegiatan.tabel_kategori_kegiatan', [
            'kategori_kegiatan' => $kategori_kegiatan,
            "title" => "tabel kategori kegiatan"
        ]);
    }

    public function create()
    {
        return view('Admin.Kelola_utilitas.kategori_kegiatan.tambah_kategori_kegiatan', [
            'title' => 'tambah-kategori kegiatan'
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'kategori_kegiatan' => 'required'
        ]);

        try {
            KategoriKegiatan::create($validatedData);

            return redirect()->route('kategori_kegiatan.index')
                ->with('success', 'Data berhasil ditambah!');
        } catch (\Exception $e) {
            return redirect()->route('kategori_kegiatan.index')
                ->with('error', 'Gagal menambahkan data!');
        }
    }

    public function edit(KategoriKegiatan $kategoriKegiatan)
    {
        return view('Admin.Kelola_utilitas.kategori_kegiatan.edit_kategori_kegiatan', [
            'kategori_kegiatan' => $kategoriKegiatan,
            'title' => 'edit-kategori-kegiatan'
        ]);
    }

    public function update(Request $request, KategoriKegiatan $kategoriKegiatan)
    {
        $validatedData = $request->validate([
            'kategori_kegiatan' => 'required'
        ]);

        KategoriKegiatan::where('id_kategori_kegiatan', $kategoriKegiatan->id_kategori_kegiatan)
            ->update($validatedData);
        return redirect()->route('kategori_kegiatan.index')->with('success', 'Data berhasil diubah!');
    }

    public function destroy(KategoriKegiatan $kategoriKegiatan)
    {
        try {
            $kategoriKegiatan->delete();
            return redirect()->route('kategori_kegiatan.index')
                ->with('success', 'data berhasil dihapus!');
        } catch (\Exception $e) {
            return redirect()->route('kategori_kegiatan.index')
                ->with('error', 'Gagal menghapus data!');
        }
    }
}
