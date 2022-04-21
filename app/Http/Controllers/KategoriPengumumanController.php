<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KategoriPengumumanController extends Controller
{
    public function index()
    {
        // mengambil data dari table pegawai
        $kategori_pengumuman = DB::table('kategori_pengumuman')->get();

        // mengirim data kategori_pengumuman ke view index
        return view('tabel_kategori_pengumuman', [
            'kategori_pengumuman' => $kategori_pengumuman,
            "title" => "tabel kategori pengumuman"
        ]);
    }

    public function create()
    {
        return view('tambah_kategori_pengumuman', [
            'title' => 'tambah-kategori pengumuman'
        ]);
    }

    // method untuk insert data ke table pegawai
    public function store(Request $request)
    {
        // insert data ke table pegawai
        DB::table('kategori_pengumuman')->insert([
            'nama_kategori_pengumuman' => $request->nama_kategori_iuran
        ]);

        // alihkan halaman ke halaman pegawai
        return redirect('/view-kategori-pengumuman');
    }

    // method untuk edit data pegawai
    public function edit($id)
    {
        // mengambil data pegawai berdasarkan id yang dipilih
        $kategori_pengumuman = DB::table('kategori_pengumuman')->where('id_kategori_pengumuman', $id)->get();
        // passing data pegawai yang didapat ke view edit.blade.php
        return view('edit_kategori_pengumuman', [
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
