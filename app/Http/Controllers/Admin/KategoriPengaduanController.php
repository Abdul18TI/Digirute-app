<?php

namespace App\Http\Controllers\Admin;

use App\Models\KategoriPengaduan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class KategoriPengaduanController extends Controller
{
    public function index()
    {
        $kategori_pengaduan = KategoriPengaduan::all();
        return view('Admin.Kelola_utilitas.kategori_pengaduan.tabel_kategori_pengaduan', [
            'kategori_pengaduan' => $kategori_pengaduan,
            "title" => "tabel kategori pengaduan"
        ]);
    }

    public function create()
    {
        return view('Admin.Kelola_utilitas.kategori_pengaduan.tambah_kategori_pengaduan', [
            'title' => 'tambah kategori pengaduan'
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_kategori_pengaduan' => 'required'
        ]);

        try {
            KategoriPengaduan::create($validatedData);

            return redirect()->route('kategori_pengaduan.index')
                ->with('success', 'Data berhasil ditambah!');
        } catch (\Exception $e) {
            return redirect()->route('kategori_pengaduan.index')
                ->with('error', 'Gagal menambahkan data!');
        }
    }

    public function edit(KategoriPengaduan $kategoriPengaduan)
    {
        return view('Admin.Kelola_utilitas.kategori_pengaduan.edit_kategori_pengaduan', [
            'kategori_pengaduan' => $kategoriPengaduan,
            'title' => 'edit-kategori-pengaduan'
        ]);
    }

    public function update(Request $request, KategoriPengaduan $kategoriPengaduan)
    {
        $validatedData = $request->validate([
            'nama_kategori_pengaduan' => 'required'
        ]);

        KategoriPengaduan::where('id_kategori_pengaduan', $kategoriPengaduan->id_kategori_pengaduan)
            ->update($validatedData);
        return redirect()->route('kategori_pengaduan.index')->with('success', 'Data berhasil diubah!');
    }

    public function destroy(KategoriPengaduan $kategoriPengaduan)
    {
        try {
            $kategoriPengaduan->delete();
            return redirect()->route('kategori_pengaduan.index')
                ->with('success', 'data berhasil dihapus!');
        } catch (\Exception $e) {
            return redirect()->route('kategori_pengaduan.index')
                ->with('error', 'Gagal menghapus data!');
        }
        // dd($kategoriPengaduan->delete());
    }
}
