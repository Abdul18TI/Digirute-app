<?php

namespace App\Http\Controllers\Admin;

use App\Models\KategoriPengumuman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class KategoriPengumumanController extends Controller
{

    public function index()
    {
        $kategori_pengumuman = KategoriPengumuman::all();
        return view('Admin.Kelola_utilitas.tabel_kategori_pengumuman', [
            'kategori_pengumuman' => $kategori_pengumuman,
            "title" => "tabel kategori pengumuman"
        ]);
    }

    public function create()
    {
        return view('Admin.Kelola_utilitas.tambah_kategori_pengumuman', [
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

            return redirect()->route('kategori_pengumuman.index')
                ->with('success', 'Created successfully!');
        } catch (\Exception $e) {
            return redirect()->route('kategori_pengumuman.index')
                ->with('error', 'Error during the creation!');
        }
    }

    public function edit(KategoriPengumuman $kategoriPengumuman)
    {
        return view('Admin.Kelola_utilitas.edit_kategori_pengumuman', [
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
        return redirect()->route('kategori_pengumuman.index');
    }

    public function destroy(KategoriPengumuman $kategoriPengumuman)
    {
        try {
            $kategoriPengumuman->delete();
            return redirect()->route('kategori_pengumuman.index')
                ->with('success', 'deleted successfully!');
        } catch (\Exception $e) {
            return redirect()->route('kategori_pengumuman.index')
                ->with('error', 'Error during the deletion!');
        }
    }
}
