<?php

namespace App\Http\Controllers\RT;

use App\Models\Fasilitas_umum;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use App\Models\Kategori_fasilitas_umum;

class FasilitasUmumRTController extends Controller
{
    public function index()
    {
        $fasilitas = Fasilitas_umum::all();

        return view('RT.fasilitas.fasilitas_umum', [
            'fasilitas' => $fasilitas,
            "title" => "tabel-fasilitas"
        ]);
    }

    public function create()
    {
        $kategori_fasilitas = Kategori_fasilitas_umum::all();
        return view('RT.fasilitas.tambah_fasilitas', [
            'kategori_fasilitas' => $kategori_fasilitas,
            'title' => 'tambah-fasilitas'
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'judul_fasilitas' => 'required',
            'kategori_fasilitas' => 'required',
            'isi_fasilitas' => 'required',
            'foto_fasilitas' => 'image|file|max:4095',
            'tgl_terbit' => 'required'
        ]);

        if ($request->file('foto_fasilitas')) {
            $validatedData['foto_fasilitas'] = $request->file('foto_fasilitas')->store('gambar-fasilitas');
        }

        $validatedData['status_fasilitas'] = 1;

        try {
            Fasilitas_umum::create($validatedData);

            return redirect()->route('rt.fasilitasrt.index')
                ->with('success', 'Data berhasil ditambah!');
        } catch (\Exception $e) {
            return redirect()->route('rt.fasilitasrt.index')
                ->with('error', 'Gagal menambahkan data!');
        }
    }

    public function edit(Fasilitas_umum $fasilitas)
    {
        return view('RT.fasilitas.edit_fasilitas', [
            'fasilitas' => $fasilitas,
            'kategori_fasilitas' => Kategori_fasilitas_umum::all(),
            'title' => 'edit-fasilitas'
        ]);
    }

    public function update(Request $request, Fasilitas_umum $fasilitas)
    {
        $validatedData = $request->validate([
            'judul_fasilitas' => 'required',
            'kategori_fasilitas' => 'required',
            'isi_fasilitas' => 'required',
            'foto_fasilitas' => 'image|file|max:4095',
            'tgl_terbit' => 'required'
        ]);

        if ($request->file('foto_fasilitas')) {
            Storage::delete($request->oldImage);
            $validatedData['foto_fasilitas'] = $request->file('foto_fasilitas')->store('gambar-fasilitas');
        }

        Fasilitas_umum::where('id_fasilitas', $fasilitas->id_fasilitas)
            ->update($validatedData);
        return redirect()->route('rw.fasilitas.index')->with('success', 'Data berhasil diubah!');
    }

    public function destroy(Fasilitas_umum $fasilitas)
    {
        // $fasilitas->delete();
        // if ($fasilitas->foto_fasilitas) {
        //     Storage::delete($fasilitas->foto_fasilitas);
        // }
        // return redirect()->route('rw.fasilitas.index');

        try {
            $fasilitas->delete();
            if ($fasilitas->foto_fasilitas) {
                Storage::delete($fasilitas->foto_fasilitas);
            }
            return redirect()->route('rt.fasilitasrt.index')
                ->with('success', 'data berhasil dihapus!');
        } catch (\Exception $e) {
            return redirect()->route('rt.fasilitasrt.index')
                ->with('error', 'Gagal menghapus data!');
        }
    }
    public function show($id)
    {
        $fasilitas = Fasilitas_umum::with('Kategori_fasilitas')->find($id);
        // dd($fasilitas);
        return view('RT.fasilitas.detail_fasilitas', [
            'fasilitas' => $fasilitas,
            'title' => 'detail-fasilitas'
        ]);
    }

    public function updateStatus(Request $request)
    {
        $pre_status = $request->status_fasilitas;

        // var_dump($pre_status);
        // echo "<br>/";
        $status = $request->status_fasilitas == 0 ? 1 : 0;
        $product = Fasilitas_umum::find($request->id_fasilitas);
        $product->status_fasilitas = $pre_status;
        // var_dump($status);
        // echo "<br>/";
        // dd($product);
        $product->save();
        return response()->json(['success' => 'Status change successfully.', 'status' => $status, 'product' => $product]);
        // return redirect()->route('rt.kegiatan.index')
        //     ->with('error', 'Gagal menghapus data!');
    }
}
