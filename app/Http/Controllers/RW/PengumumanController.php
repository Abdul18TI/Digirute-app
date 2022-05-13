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
        return redirect()->route('pengumuman.index');
    }

    // method untuk edit data pegawai
    public function edit(Pengumuman $pengumuman)
    {
        $kategori_pengumuman = KategoriPengumuman::all();
        $pengumuman = Pengumuman::all();
        return view('RW.Pengumuman.edit_pengumuman', [
            'kategori_pengumuman' => $kategori_pengumuman,
            'pengumuman' => $pengumuman,
            'title' => 'edit-pengumuman'
        ]);
    }

    public function update(Request $request, Pengumuman $pengumuman)
    {
        $validatedData = $request->validate([
            'judul_pengumuman' => 'required',
            'kategori_pengumuman' => 'required',
            'isi_pengumuman' => 'required',
            'foto_pengumuman' => 'image|file|max:2048',
            'tgl_terbit' => 'required'
        ]);

        if ($request->file('foto_pengumuman')) {
            Storage::delete($request->oldImage);
            $validatedData['foto_pengumuman'] = $request->file('foto_pengumuman')->store('gambar-pengumuman');
        }

        Pengumuman::where('id_pengumuman', $pengumuman->id_pengumuman)
            ->update($validatedData);
        return redirect()->route('pengumuman.index');
    }

    // method untuk hapus data pegawai
    public function destroy(Pengumuman $pengumuman)
    {
        // Pengumuman::destroy($pengumuman->id_pengumuman);
        $pengumuman->delete();
        if ($pengumuman->foto_pengumuman) {
            Storage::delete($pengumuman->foto_pengumuman);
        }
        // return redirect()->route('rw.pengumuman.home');
        return redirect()->route('pengumuman.index');
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
