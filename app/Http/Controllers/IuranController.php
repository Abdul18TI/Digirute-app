<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IuranController extends Controller
{
    public function index()
    {
        // mengambil data dari table pegawai
        $iuran = DB::table('iurans')->get();

        // mengirim data iuran ke view index
        return view('tabel_iuran', [
            'iuran' => $iuran,
            "title" => "tabel iuran"
        ]);
    }

    public function create()
    {
        return view('tambah_iuran', [
            'title' => 'tambah-iuran'
        ]);
    }

    // method untuk insert data ke table pegawai
    public function store(Request $request)
    {
        // insert data ke table pegawai
        DB::table('iurans')->insert([
            'pj_iuran' => 'abdul',
            'judul_iuran' => $request->judul_iuran,
            'jenis_iuran' => $request->jenis_iuran,
            'target_iuran' => $request->other_text,
            'jumlah_iuran' => $request->jumlah_iuran,
            'tgl_mulai_iuran' => $request->tgl_mulai_iuran,
            'tgl_akhir_iuran' => $request->tgl_akhir_iuran,
            'deskripsi_iuran' => $request->deskripsi_iuran,
            'status_iuran' => 1
        ]);

        // alihkan halaman ke halaman pegawai
        return redirect('/view-iuran');
    }

    // method untuk edit data pegawai
    public function edit($id)
    {
        // mengambil data pegawai berdasarkan id yang dipilih
        $iuran = DB::table('iurans')->where('id_iuran', $id)->get();
        // passing data pegawai yang didapat ke view edit.blade.php
        return view('edit_iuran', [
            'iuran' => $iuran,
            'title' => 'edit-iuran'
        ]);
    }

    // update data pegawai
    public function update(Request $request)
    {
        // update data pegawai
        DB::table('iurans')->where('id_iuran', $request->id)->update([
            'pj_iuran' => 'abdul',
            'judul_iuran' => $request->judul_iuran,
            'jenis_iuran' => $request->jenis_iuran,
            'target_iuran' => $request->other_text,
            'jumlah_iuran' => $request->jumlah_iuran,
            'tgl_mulai_iuran' => $request->tgl_mulai_iuran,
            'tgl_akhir_iuran' => $request->tgl_akhir_iuran,
            'deskripsi_iuran' => $request->deskripsi_iuran,
            'status_iuran' => 1
        ]);
        // alihkan halaman ke halaman pegawai
        return redirect('/view-iuran');
    }

    // method untuk hapus data pegawai
    public function hapus($id)
    {
        // menghapus data pegawai berdasarkan id yang dipilih
        DB::table('iurans')->where('id_iuran', $id)->delete();

        // alihkan halaman ke halaman pegawai
        return redirect('/view-iuran');
    }
}
