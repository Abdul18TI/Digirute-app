<?php

namespace App\Http\Controllers;

use App\Models\Pengumuman;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PengumumanController extends Controller
{
    public function index()
    {
        // mengambil data dari table pegawai
        $pengumuman = DB::table('pengumuman')->get();

        // mengirim data pengumuman ke view index
        return view('tabel_pengumuman', [
            'pengumuman' => $pengumuman,
            "title" => "tabel-pengumuman"
        ]);
    }

    public function create()
    {
        return view('tambah_pengumuman', [
            'title' => 'tambah-pengumuman'
        ]);
    }

    // method untuk insert data ke table pegawai
    public function store(Request $request)
    {

        if ($request->file('foto_pengumuman')) {
            // insert data ke table pegawai
            DB::table('pengumuman')->insert([
                'kategori_pengumuman' => 'umum',
                'judul_pengumuman' => $request->judul_pengumuman,
                'isi_pengumuman' => $request->isi_pengumuman,
                'foto_pengumuman' =>  $request->file('foto_pengumuman')->store('gambar-pengumuman'),
                'status_pengumuman' => 1,
                'tgl_terbit' => $request->tgl_terbit
            ]);
            // alihkan halaman ke halaman pegawai
        } else {
            // insert data ke table pegawai
            DB::table('pengumuman')->insert([
                'kategori_pengumuman' => 'umum',
                'judul_pengumuman' => $request->judul_pengumuman,
                'isi_pengumuman' => $request->isi_pengumuman,
                'status_pengumuman' => 1,
                'tgl_terbit' => $request->tgl_terbit
            ]);
        }
        return redirect('/view-pengumuman');
    }

    // method untuk edit data pegawai
    public function edit($id)
    {
        // mengambil data pegawai berdasarkan id yang dipilih
        $pengumuman = DB::table('pengumuman')->where('id_pengumuman', $id)->get();
        // passing data pegawai yang didapat ke view edit.blade.php
        return view('edit_pengumuman', [
            'pengumuman' => $pengumuman,
            'title' => 'edit-pengumuman'
        ]);
    }

    // update data pegawai
    public function update(Request $request)
    {
        if ($request->file('foto_pengumuman')) {
            // update data pegawai
            DB::table('pengumuman')->where('id_pengumuman', $request->id)->update([
                'kategori_pengumuman' => 'umum',
                'judul_pengumuman' => $request->judul_pengumuman,
                'isi_pengumuman' => $request->isi_pengumuman,
                'foto_pengumuman' =>  $request->file('foto_pengumuman')->store('gambar-pengumuman'),
                'status_pengumuman' => 1,
                'tgl_terbit' => $request->tgl_terbit
            ]);
            Storage::delete($request->oldImage);
        } else {
            // update data pegawai
            DB::table('pengumuman')->where('id_pengumuman', $request->id)->update([
                'kategori_pengumuman' => 'umum',
                'judul_pengumuman' => $request->judul_pengumuman,
                'isi_pengumuman' => $request->isi_pengumuman,
                'status_pengumuman' => 1,
                'tgl_terbit' => $request->tgl_terbit
            ]);
        }

        // alihkan halaman ke halaman pegawai
        return redirect('/view-pengumuman');
    }

    // method untuk hapus data pegawai
    public function hapus(Pengumuman $pengumuman)
    {
        if ($pengumuman->foto_pengumuman) {
            Storage::delete($pengumuman->foto_pengumuman);
        }
        Pengumuman::destroy($pengumuman->id_pengumuman);
        return redirect('/view-pengumuman');
        // $pengumuman = DB::table('pengumuman')->where('id_pengumuman', $id)->get();
        // return $pengumuman;
        // if ($pengumuman->foto_pengumuman) {
        //     Storage::delete($pengumuman->foto_pengumuman);
        //     // menghapus data pegawai berdasarkan id yang dipilih
        //     DB::table('pengumuman')->where('id_pengumuman', $id)->delete();
        // } else {
        //     DB::table('pengumuman')->where('id_pengumuman', $id)->delete();
        // }


        // // alihkan halaman ke halaman pegawai
        // return redirect('/view-pengumuman');
    }

    // method untuk melihat detail data pegawai
    public function detail($id)
    {
        // mengambil data pegawai berdasarkan id yang dipilih
        $pengumuman = DB::table('pengumuman')->where('id_pengumuman', $id)->get();
        // passing data pegawai yang didapat ke view edit.blade.php
        return view('detail_pengumuman', [
            'pengumuman' => $pengumuman,
            'title' => 'detail-pengumuman'
        ]);
    }
}
