<?php

namespace App\Http\Controllers\Admin;

use App\Models\KategoriPengumuman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class KategoriPengumumanController extends Controller
{
    public function index()
    {
        // mengambil data dari table pegawai
        $kategori_pengumuman = KategoriPengumuman::all();

        // mengirim data kategori_pengumuman ke view index
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

    // method untuk insert data ke table pegawai
    public function store(Request $request)
    {
        // insert data ke table pegawai
        $validatedData = $request->validate([
            'nama_kategori_pengumuman' => 'required'
        ]);

        KategoriPengumuman::create($validatedData);
        // alihkan halaman ke halaman pegawai
        return redirect()->route('admin.kategoripengumuman.home');
    }

    // method untuk edit data pegawai
    public function edit($id)
    {
        // mengambil data pegawai berdasarkan id yang dipilih
        $kategori_pengumuman = DB::table('kategori_pengumuman')->where('id_kategori_pengumuman', $id)->get();
        // passing data pegawai yang didapat ke view edit.blade.php
        return view('Admin.Kelola_utilitas.edit_kategori_pengumuman', [
            'kategori_pengumuman' => $kategori_pengumuman,
            'title' => 'edit-kategori-pengumuman'
        ]);
    }

    // update data pegawai
    public function update(Request $request)
    {
        // update data pegawai
        DB::table('kategori_pengumuman')->where('id_kategori_pengumuman', $request->id)->update([
            'nama_kategori_pengumuman' => $request->nama_kategori_pengumuman
        ]);
        // alihkan halaman ke halaman pegawai
        return redirect('/view-kategori-pengumuman');
    }

    // method untuk hapus data pegawai
    public function hapus($id)
    {
        // menghapus data pegawai berdasarkan id yang dipilih
        DB::table('kategori_pengumuman')->where('id_kategori_pengumuman', $id)->delete();

        // alihkan halaman ke halaman pegawai
        return redirect('/view-kategori-pengumuman');
    }
}
