<?php

namespace App\Http\Controllers\RW;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Iuran;
use App\Models\Warga;
use App\Models\JenisIuran;
use App\Http\Controllers\Controller;

class IuranController extends Controller
{
    public function index()
    {
        $iuran = Iuran::all();

        return view('RW.Iuran.tabel_iuran', [
            'iuran' => $iuran,
            "title" => "tabel iuran"
        ]);
    }

    public function create()
    {
        $jenis_iuran = JenisIuran::all();
        return view('RW.Iuran.tambah_iuran', [
            'jenis_iuran' => $jenis_iuran,
            'title' => 'tambah-iuran'
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'judul_iuran' => 'required',
            'jenis_iuran' => 'required',
            'jumlah_iuran' => 'Integer',
            'target_iuran' => 'Integer',
            'tgl_mulai_iuran' => 'required',
            'tgl_akhir_iuran' => 'required',
            'deskripsi_iuran' => 'required'
        ]);

        $validatedData['pj_iuran'] = 1;
        $validatedData['status_iuran'] = 1;

        try {
            Iuran::create($validatedData);

            return redirect()->route('rw.iuran.index')
                ->with('success', 'Data berhasil ditambah!');
        } catch (\Exception $e) {
            return redirect()->route('rw.iuran.index')
                ->with('error', 'Gagal menambahkan data!');
        }
    }

    public function edit(Iuran $iuran)
    {
        return view('RW.Iuran.edit_iuran', [
            'iuran' => $iuran,
            'jenis_iuran' => JenisIuran::all(),
            'title' => 'edit-iuran'
        ]);
    }

    public function update(Request $request, Iuran $iuran)
    {
        $validatedData = $request->validate([
            'judul_iuran' => 'required',
            'jenis_iuran' => 'required',
            'jumlah_iuran' => 'Integer',
            'target_iuran' => 'Integer',
            'tgl_mulai_iuran' => 'required',
            'tgl_akhir_iuran' => 'required',
            'deskripsi_iuran' => 'required'
        ]);

        $validatedData['pj_iuran'] = 1;
        $validatedData['status_iuran'] = 1;

        iuran::where('id_iuran', $iuran->id_iuran)
            ->update($validatedData);

        return redirect()->route('rw.iuran.index')->with('success', 'Data berhasil diubah!');
    }

    public function destroy(Iuran $iuran)
    {

        try {
            $iuran->delete();
            return redirect()->route('rw.iuran.index')
                ->with('success', 'data berhasil dihapus!');
        } catch (\Exception $e) {
            return redirect()->route('rw.iuran.index')
                ->with('error', 'Gagal menghapus data!');
        }
    }

    public function show($id)
    {
        $iuran = iuran::with('jenis_iurans')->where('id_iuran', $id)->first();
        // dd($iuran->jenis_iurans->nama_jenis_iuran);
        // $iuran = DB::table('iurans')
        //     ->join('jenis_iuran', 'iurans.id_iuran', '=', 'jenis_iuran.id_jenis_iuran')
        //     ->select('iurans.*', 'jenis_iuran.nama_jenis_iuran')
        //     ->where('iurans.id_iuran', '=', $id)
        //     ->first();
        // $iuran = Iuran::fInd($id);
        // $warga = Warga::all();
        $warga = DB::table('wargas')
            ->leftJoin('pembayaran', 'wargas.id_warga', '=', 'pembayaran.id_warga')
            ->select('wargas.nama_lengkap', 'wargas.alamat', 'pembayaran.*')
            ->get();

        return view('RW.Iuran.detail_iuran', [
            'iuran' => $iuran,
            'warga' => $warga,
            'title' => 'detail-iuran'
        ]);
    }

    function action(Request $request)
    {
        if ($request->ajax()) {
            if ($request->action == 'Edit') {
                $data = array(
                    'jumlah_bayar' => $request->jumlah_bayar
                );
                DB::table('pembayaran')
                    ->where('id_pembayaran', $request->id_pembayaran)
                    ->update($data);
            }
            if ($request->action == 'delete') {
                DB::table('pembayaran')
                    ->where('id_pembayaran', $request->id_pembayaran)
                    ->delete();
            }
            return request()->json($request);
        }
    }
}
