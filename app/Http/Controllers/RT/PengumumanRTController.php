<?php

namespace App\Http\Controllers\RT;

use App\Models\Pengumuman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use App\Models\KategoriPengumuman;

class PengumumanRTController extends Controller
{
    public function index()
    {
        $pengumuman = Pengumuman::all();

        return view('RT.Pengumuman.tabel_pengumuman', [
            'pengumuman' => $pengumuman,
        ]);
    }

    public function create()
    {
        $kategori_pengumuman = KategoriPengumuman::all();
        return view('RT.Pengumuman.tambah_pengumuman', [
            'kategori_pengumuman' => $kategori_pengumuman,
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

        $validatedData['status_pengumuman'] =1;
        $validatedData['penanggung_jawab'] = 'RT';
        $validatedData['id_penanggung_jawab'] = auth()->id();

        // dd();
        try {
            Pengumuman::create($validatedData);
            return redirect()->route('rt.pengumuman.index')
                ->with('success', 'Data berhasil ditambah!');
        } catch (\Exception $e) {
            return redirect()->route('rt.pengumuman.index')
                ->with('error', 'Gagal menambahkan data!');
        }
    }

    public function edit(Pengumuman $pengumuman)
    {
        return view('RT.Pengumuman.edit_pengumuman', [
            'pengumuman' => $pengumuman,
            'kategori_pengumuman' => KategoriPengumuman::all(),
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
        $validatedData['penanggung_jawab'] = 'RT';
        $validatedData['id_penanggung_jawab'] = auth()->id();

        if ($request->file('foto_pengumuman')) {
            Storage::delete($request->oldImage);
            $validatedData['foto_pengumuman'] = $request->file('foto_pengumuman')->store('gambar-pengumuman');
        }

        Pengumuman::where('id_pengumuman', $pengumuman->id_pengumuman)
            ->update($validatedData);
        return redirect()->route('rt.pengumuman.index')->with('success', 'Data berhasil diubah!');
    }

    public function destroy(Pengumuman $pengumuman)
    {
        try {
            $pengumuman->delete();
            if ($pengumuman->foto_pengumuman) {
                Storage::delete($pengumuman->foto_pengumuman);
            }
            return redirect()->route('rt.pengumuman.index')
                ->with('success', 'data berhasil dihapus!');
        } catch (\Exception $e) {
            return redirect()->route('rt.pengumuman.index')
                ->with('error', 'Gagal menghapus data!');
        }
    }
    public function show($id)
    {
        $pengumuman = Pengumuman::with('Kategori_pengumumans')->find($id);
        return view('RT.Pengumuman.detail_pengumuman', [
            'pengumuman' => $pengumuman,
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
