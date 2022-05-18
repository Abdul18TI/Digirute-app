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
        // $validatedData = $request->validate([
        //     'pj_iuran' => 'required',
        //     'kategori_pengumuman' => 'required',
        //     'isi_pengumuman' => 'required',
        //     'foto_pengumuman' => 'image|file|max:2048',
        //     'tgl_terbit' => 'required'
        // ]);

        DB::table('iurans')->insert([
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

        return redirect('/view-iuran');
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
        return redirect('/view-iuran');
    }

    public function destroy($id)
    {
        DB::table('iurans')->where('id_iuran', $id)->delete();

        return redirect('/view-iuran');
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
