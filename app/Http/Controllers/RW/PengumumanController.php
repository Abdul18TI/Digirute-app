<?php

namespace App\Http\Controllers\RW;

use App\Models\Pengumuman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use App\Models\KategoriPengumuman;

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
            'foto_pengumuman' => 'image|file|max:4095',
            'tgl_terbit' => 'required'
        ]);

        if ($request->file('foto_pengumuman')) {
            $validatedData['foto_pengumuman'] = $request->file('foto_pengumuman')->store('gambar-pengumuman');
        }

        $validatedData['status_pengumuman'] = 1;
        $validatedData['status_kegiatan'] = 1;
        $validatedData['penanggung_jawab'] = 'RW';
        $validatedData['id_penanggung_jawab'] = auth()->id();

        try {
            Pengumuman::create($validatedData);

            return redirect()->route('rw.pengumuman.index')
                ->with('success', 'Data berhasil ditambah!');
        } catch (\Exception $e) {
            return redirect()->route('rw.pengumuman.index')
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
            'foto_pengumuman' => 'image|file|max:4095',
            'tgl_terbit' => 'required'
        ]);
        $validatedData['status_kegiatan'] = 1;
        $validatedData['penanggung_jawab'] = 'RW';
        $validatedData['id_penanggung_jawab'] = auth()->id();

        if ($request->file('foto_pengumuman')) {
            Storage::delete($request->oldImage);
            $validatedData['foto_pengumuman'] = $request->file('foto_pengumuman')->store('gambar-pengumuman');
        }

        Pengumuman::where('id_pengumuman', $pengumuman->id_pengumuman)
            ->update($validatedData);
        return redirect()->route('rw.pengumuman.index')->with('success', 'Data berhasil diubah!');
    }

    public function destroy(Pengumuman $pengumuman)
    {
        // $pengumuman->delete();
        // if ($pengumuman->foto_pengumuman) {
        //     Storage::delete($pengumuman->foto_pengumuman);
        // }
        // return redirect()->route('rw.pengumuman.index');

        try {
            $pengumuman->delete();
            if ($pengumuman->foto_pengumuman) {
                Storage::delete($pengumuman->foto_pengumuman);
            }
            return redirect()->route('rw.pengumuman.index')
                ->with('success', 'data berhasil dihapus!');
        } catch (\Exception $e) {
            return redirect()->route('rw.pengumuman.index')
                ->with('error', 'Gagal menghapus data!');
        }
    }
    public function show($id)
    {
        $pengumuman = Pengumuman::with('Kategori_pengumumans')->find($id);
        // dd($pengumuman);
        return view('RW.Pengumuman.detail_pengumuman', [
            'pengumuman' => $pengumuman,
            'title' => 'detail-pengumuman'
        ]);
    }

    public function updateStatus(Request $request)
    {
        $pre_status = $request->status_pengumuman;

        // var_dump($pre_status);
        // echo "<br>/";
        $status = $request->status_pengumuman == 0 ? 1 : 0;
        $product = Pengumuman::find($request->id_pengumuman);
        $product->status_pengumuman = $pre_status;
        // var_dump($status);
        // echo "<br>/";
        // dd($product);
        $product->save();
        return response()->json(['success' => 'Status change successfully.', 'status' => $status, 'product' => $product]);
        // return redirect()->route('rt.kegiatan.index')
        //     ->with('error', 'Gagal menghapus data!');
    }
}
