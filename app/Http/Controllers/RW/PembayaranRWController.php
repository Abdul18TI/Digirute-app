<?php

namespace App\Http\Controllers\RW;

use App\Models\pembayaran;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class PembayaranRWController extends Controller
{
    public function index()
    {
        $pembayaran = pembayaran::all();

        return view('RW.pembayaran.tabel_pembayaran', [
            'pembayaran' => $pembayaran,
            "title" => "tabel-pembayaran"
        ]);
    }

    // public function create()
    // {
    //     return view('RW.pembayaran.tambah_pembayaran', [
    //         'kategori_pembayaran' => $kategori_pembayaran,
    //         'title' => 'tambah-pembayaran'
    //     ]);
    // }

    public function store(Request $request)
    {
        dd($request->all());
        // echo "AS";
    }

    public function edit(pembayaran $pembayaran)
    {
        return view('RW.pembayaran.edit_pembayaran', [
            'pembayaran' => $pembayaran,
            // 'kategori_pembayaran' => Kategoripembayaran::all(),
            'title' => 'edit-pembayaran'
        ]);
    }

    public function update(Request $request, pembayaran $pembayaran)
    {
        $validatedData = $request->validate([
            'judul_pembayaran' => 'required',
            'kategori_pembayaran' => 'required',
            'isi_pembayaran' => 'required',
            'foto_pembayaran' => 'image|file|max:4095',
            'tgl_terbit' => 'required'
        ]);

        if ($request->file('foto_pembayaran')) {
            Storage::delete($request->oldImage);
            $validatedData['foto_pembayaran'] = $request->file('foto_pembayaran')->store('gambar-pembayaran');
        }

        pembayaran::where('id_pembayaran', $pembayaran->id_pembayaran)
            ->update($validatedData);
        return redirect()->route('pembayaran.index')->with('success', 'Data berhasil diubah!');
    }

    public function destroy(pembayaran $pembayaran)
    {
        // $pembayaran->delete();
        // if ($pembayaran->foto_pembayaran) {
        //     Storage::delete($pembayaran->foto_pembayaran);
        // }
        // return redirect()->route('pembayaran.index');

        try {
            $pembayaran->delete();
            if ($pembayaran->foto_pembayaran) {
                Storage::delete($pembayaran->foto_pembayaran);
            }
            return redirect()->route('pembayaran.index')
                ->with('success', 'data berhasil dihapus!');
        } catch (\Exception $e) {
            return redirect()->route('pembayaran.index')
                ->with('error', 'Gagal menghapus data!');
        }
    }
    public function show($id)
    {
        $pembayaran = pembayaran::find($id);
        return view('RW.pembayaran.detail_pembayaran', [
            'pembayaran' => $pembayaran,
            'title' => 'detail-pembayaran'
        ]);
    }
}
