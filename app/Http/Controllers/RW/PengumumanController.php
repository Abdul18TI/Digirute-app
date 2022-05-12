<?php

namespace App\Http\Controllers\RW;

use App\Models\Pengumuman;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use App\Models\KategoriPengumuman;

class PengumumanController extends Controller
{
    public function index()
    {
        // mengambil data dari table pegawai
        $pengumuman = Pengumuman::all();

        // mengirim data pengumuman ke view index
        return view('RW.Pengumuman.tabel_pengumuman', [
            'pengumuman' => $pengumuman,
            "title" => "tabel-pengumuman"
        ]);
    }

    public function create()
    {
        $kategori_pengumuman = KategoriPengumuman::all();
        return view('RW.Pengumuman.tambah_pengumuman', [
            'kategori_pengumuman' => $kategori_pengumuman,
            'title' => 'tambah-pengumuman'
        ]);
    }

    // method untuk insert data ke table pegawai
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'judul_pengumuman' => 'required',
            'kategori_pengumuman' => 'required',
            'isi_pengumuman' => 'required',
            'foto_pengumuman' => 'image|file|max:2048',
            'tgl_terbit' => 'required'
        ]);

        if ($request->file('foto_pengumuman')) {
            $validatedData['foto_pengumuman'] = $request->file('foto_pengumuman')->store('gambar-pengumuman');
        }

        $validatedData['status_pengumuman'] = 1;

        Pengumuman::create($validatedData);
        return redirect()->route('rw.pengumuman.home');
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
        return redirect()->route('rw.pengumuman.home');
    }

    // method untuk hapus data pegawai
    public function delete(Pengumuman $pengumuman)
    {
        Pengumuman::destroy($pengumuman->id_pengumuman);
        if ($pengumuman->foto_pengumuman) {
            Storage::delete($pengumuman->foto_pengumuman);
        }
        return redirect()->route('rw.pengumuman.home');
    }
    public function detail($id)
    {
        // mengambil data pegawai berdasarkan id yang dipilih
        $pengumuman = DB::table('pengumuman')->where('id_pengumuman', $id)->get();
        // passing data pegawai yang didapat ke view edit.blade.php
        return view('RW.Pengumuman.detail_pengumuman', [
            'pengumuman' => $pengumuman,
            'title' => 'detail-pengumuman'
        ]);
    }
}
