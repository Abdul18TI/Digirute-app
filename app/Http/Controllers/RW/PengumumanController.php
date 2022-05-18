<?php

namespace App\Http\Controllers\RW;

use App\Models\Pengumuman;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use App\Models\KategoriPengumuman;
use RealRashid\SweetAlert\Facades\Alert;

class PengumumanController extends Controller
{
    public function index()
    {
        $pengumuman = Pengumuman::all();

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

        try {
            Pengumuman::create($validatedData);

            return redirect()->route('pengumuman.index')
                ->with('success', 'Data berhasil ditambah!');
        } catch (\Exception $e) {
            return redirect()->route('pengumuman.index')
                ->with('error', 'Gagal menambahkan data!');
        }
    }

    public function edit(Pengumuman $pengumuman)
    {
        return view('RW.Pengumuman.edit_pengumuman', [
            'pengumuman' => $pengumuman,
            'kategori_pengumuman' => KategoriPengumuman::all(),
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
        return redirect()->route('pengumuman.index')->with('success', 'Data berhasil diubah!');
    }

    public function destroy(Pengumuman $pengumuman)
    {
        // $pengumuman->delete();
        // if ($pengumuman->foto_pengumuman) {
        //     Storage::delete($pengumuman->foto_pengumuman);
        // }
        // return redirect()->route('pengumuman.index');

        try {
            $pengumuman->delete();
            if ($pengumuman->foto_pengumuman) {
                Storage::delete($pengumuman->foto_pengumuman);
            }
            return redirect()->route('pengumuman.index')
                ->with('success', 'data berhasil dihapus!');
        } catch (\Exception $e) {
            return redirect()->route('pengumuman.index')
                ->with('error', 'Gagal menghapus data!');
        }
    }
    public function show($id)
    {
        $pengumuman = Pengumuman::find($id);
        return view('RW.Pengumuman.detail_pengumuman', [
            'pengumuman' => $pengumuman,
            'title' => 'detail-pengumuman'
        ]);
    }
}
