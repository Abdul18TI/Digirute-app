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
        $fasilitas = Fasilitas_umum::with('rts')->where('status_fasilitas', 1)->latest()->filter(request(['search', 'category']))->paginate(7)->withQueryString();
        // dd($fasilitas);
        return view('RT.fasilitas.fasilitas_umum', [
            'fasilitas' =>$fasilitas ,
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
            'fasilitas_umum' => 'required',
            'kategori_fasilitas_umum' => 'required',
            'deskripsi_fasilitas' => 'required',
            'foto_fasilitas' => 'required|image|file|max:4095',
            'alamat_fasilitas' => 'required',
            'koordinant_fasilitas' => 'required'
        ]);

        if ($request->file('foto_fasilitas')) {
            $validatedData['foto_fasilitas'] = $request->file('foto_fasilitas')->store('gambar-fasilitas');
        }

        $validatedData['status_fasilitas'] = 1;
        $validatedData['rt'] = auth()->user()->id_rt;
        $validatedData['rw'] = auth()->user()->id_rw;
// dd($validatedData);

        try {
            Fasilitas_umum::create($validatedData);

            return redirect()->route('rt.fasilitas.index')
                ->with('success', 'Data berhasil ditambah!');
        } catch (\Exception $e) {
            return redirect()->route('rt.fasilitas.index')
                ->with('error', 'Gagal menambahkan data!');
        }
    }

    public function edit(Fasilitas_umum $fasilita)
    {
        return view('RT.fasilitas.edit_fasilitas', [
            'fasilitas' => $fasilita,
            'kategori_fasilitas' => Kategori_fasilitas_umum::all(),
            'title' => 'edit-fasilitas'
        ]);
    }

    public function update(Request $request, Fasilitas_umum $fasilita)
    {
        $validatedData = $request->validate([
            'fasilitas_umum' => 'required',
            'kategori_fasilitas_umum' => 'required',
            'deskripsi_fasilitas' => 'required',
            'foto_fasilitas' => 'image|file|max:4095',
            'alamat_fasilitas' => 'required',
            'koordinant_fasilitas' => 'required'
        ]);

        if ($request->file('foto_fasilitas')) {
            Storage::delete($request->oldImage);
            $validatedData['foto_fasilitas'] = $request->file('foto_fasilitas')->store('gambar-fasilitas');
        }

        Fasilitas_umum::where('id_fasilitas_umum', $fasilita->id_fasilitas_umum)
            ->update($validatedData);
        return redirect()->route('rt.fasilitas.index')->with('success', 'Data berhasil diubah!');
    }

    public function destroy(Fasilitas_umum $fasilita)
    {
        // $fasilitas->delete();
        // if ($fasilitas->foto_fasilitas) {
        //     Storage::delete($fasilitas->foto_fasilitas);
        // }
        // return redirect()->route('rw.fasilitas.index');

        try {
            $fasilita->delete();
            if ($fasilita->foto_fasilitas) {
                Storage::delete($fasilita->foto_fasilitas);
            }
            return redirect()->route('rt.fasilitas.index')
                ->with('success', 'Data berhasil dihapus!');
        } catch (\Exception $e) {
            return redirect()->route('rt.fasilitas.index')
                ->with('error', 'Gagal menghapus data!');
        }
    }
    public function show($id)
    {
        $fasilitas = Fasilitas_umum::with('fasilitas_umumss')->find($id);
        // dd($fasilitas->id_fasilitas_umum);
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
