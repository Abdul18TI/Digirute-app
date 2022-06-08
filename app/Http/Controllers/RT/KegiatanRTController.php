<?php

namespace App\Http\Controllers\RT;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Kegiatan;
use Illuminate\Support\Facades\Storage;
use App\Models\KategoriKegiatan;

class KegiatanController extends Controller
{
    public function index()
    {
        $kegiatan = Kegiatan::all();

        return view('RT.kegiatan.tabel_kegiatan', [
            'kegiatan' => $kegiatan,
            "title" => "tabel-kegiatan"
        ]);
    }

    public function create()
    {
        $kategori_kegiatan = KategoriKegiatan::all();
        return view('RT.kegiatan.tambah_kegiatan', [
            'kategori_kegiatan' => $kategori_kegiatan,
            'title' => 'tambah-kegiatan'
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_kegiatan' => 'required',
            'kategori_kegiatan' => 'required',
            'isi_kegiatan' => 'required',
            'foto_kegiatan' => 'image|file|max:2048',
            'tgl_mulai_kegiatan' => 'required',
            'tgl_selesai_kegiatan' => 'required'
        ]);

        if ($request->file('foto_kegiatan')) {
            $validatedData['foto_kegiatan'] = $request->file('foto_kegiatan')->store('gambar-kegiatan');
        }

        $validatedData['status_kegiatan'] = 1;

        try {
            Kegiatan::create($validatedData);

            return redirect()->route('kegiatan.index')
                ->with('success', 'Data berhasil ditambah!');
        } catch (\Exception $e) {
            return redirect()->route('kegiatan.index')
                ->with('error', 'Gagal menambahkan data!');
        }
    }

    public function edit(Kegiatan $kegiatan)
    {
        return view('RT.kegiatan.edit_kegiatan', [
            'kegiatan' => $kegiatan,
            'kategori_kegiatan' => KategoriKegiatan::all(),
            'title' => 'edit-kegiatan'
        ]);
    }

    public function update(Request $request, Kegiatan $kegiatan)
    {
        $validatedData = $request->validate([
            'nama_kegiatan' => 'required',
            'kategori_kegiatan' => 'required',
            'isi_kegiatan' => 'required',
            'foto_kegiatan' => 'image|file|max:2048',
            'tgl_mulai_kegiatan' => 'required',
            'tgl_selesai_kegiatan' => 'required'
        ]);

        if ($request->file('foto_kegiatan')) {
            Storage::delete($request->oldImage);
            $validatedData['foto_kegiatan'] = $request->file('foto_kegiatan')->store('gambar-kegiatan');
        }

        Kegiatan::where('id_kegiatan', $kegiatan->id_kegiatan)
            ->update($validatedData);
        return redirect()->route('kegiatan.index')->with('success', 'Data berhasil diubah!');
    }

    public function destroy(kegiatan $kegiatan)
    {
        // $kegiatan->delete();
        // if ($kegiatan->foto_kegiatan) {
        //     Storage::delete($kegiatan->foto_kegiatan);
        // }
        // return redirect()->route('kegiatan.index');

        try {
            $kegiatan->delete();
            if ($kegiatan->foto_kegiatan) {
                Storage::delete($kegiatan->foto_kegiatan);
            }
            return redirect()->route('kegiatan.index')
                ->with('success', 'data berhasil dihapus!');
        } catch (\Exception $e) {
            return redirect()->route('kegiatan.index')
                ->with('error', 'Gagal menghapus data!');
        }
    }
    public function show($id)
    {
        $kegiatan = Kegiatan::find($id);
        return view('RT.kegiatan.detail_kegiatan', [
            'kegiatan' => $kegiatan,
            'title' => 'detail-kegiatan'
        ]);
    }
}
