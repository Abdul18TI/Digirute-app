<?php

namespace App\Http\Controllers\RW;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Iuran;
use App\Http\Controllers\Controller;

class IuranController extends Controller
{
    public function index()
    {
        $iuran = Iuran::all();

        return view('tabel_iuran', [
            'iuran' => $iuran,
            "title" => "tabel iuran"
        ]);
    }

    public function create()
    {
        return view('tambah_iuran', [
            'title' => 'tambah-iuran'
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'judul_iuran' => 'required',
            'jenis_iuran' => 'required',
            'jumlah_iuran' => 'required',
            'tgl_mulai_iuran' => 'required',
            'tgl_akhir_iuran' => 'required',
            'deskripsi_iuran' => 'required'
        ]);

        $validatedData['pj_iuran'] = 'abdul';
        $validatedData['status_iuran'] = 1;

        try {
            Iuran::create($validatedData);

            return redirect()->route('iuran.index')
                ->with('success', 'Data berhasil ditambah!');
        } catch (\Exception $e) {
            return redirect()->route('iuran.index')
                ->with('error', 'Gagal menambahkan data!');
        }
    }

    public function edit($id)
    {
        $iuran = DB::table('iurans')->where('id_iuran', $id)->get();
        return view('edit_iuran', [
            'iuran' => $iuran,
            'title' => 'edit-iuran'
        ]);
    }

    public function update(Request $request)
    {
        DB::table('iurans')->where('id_iuran', $request->id)->update([
            'pj_iuran' => 'abdul',
            'judul_iuran' => $request->judul_iuran,
            'jenis_iuran' => $request->jenis_iuran,
            'target_iuran' => $request->other_text,
            'jumlah_iuran' => $request->jumlah_iuran,
            'tgl_mulai_iuran' => $request->tgl_mulai_iuran,
            'tgl_akhir_iuran' => $request->tgl_akhir_iuran,
            'deskripsi_iuran' => $request->deskripsi_iuran,
            'status_iuran' => 1
        ]);
        return redirect()->route('iuran.index')->with('success', 'Data berhasil diubah!');
    }

    public function destroy(Iuran $iuran)
    {

        try {
            $iuran->delete();
            return redirect()->route('iuran.index')
                ->with('success', 'data berhasil dihapus!');
        } catch (\Exception $e) {
            return redirect()->route('iuran.index')
                ->with('error', 'Gagal menghapus data!');
        }
    }

    public function show($id)
    {
        $iuran = DB::table('iurans')->where('id_iuran', $id)->get();
        return view('detail_iuran', [
            'iuran' => $iuran,
            'title' => 'detail-iuran'
        ]);
    }
}
