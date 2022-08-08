<?php

namespace App\Http\Controllers\RT;

use App\Models\Iuran;
use App\Models\JenisIuran;
use App\Models\Warga;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Pembayaran;

class IuranRTController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $iuran = Iuran::where('pj_iuran', auth()->user()->id_rt)->get();
        return view('RT.Iuran.tabel_iuran', [
            'iuran' => $iuran,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jenis_iuran = JenisIuran::all();
        return view('RT.Iuran.tambah_iuran', [
            'jenis_iuran' => $jenis_iuran,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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

        $validatedData['pj_iuran'] = auth()->user()->id_rt;
        $validatedData['status_iuran'] = 1;

        try {
            Iuran::create($validatedData);

            return redirect()->route('rt.iuran.index')
                ->with('success', 'Data berhasil ditambah!');
        } catch (\Exception $e) {
            return redirect()->route('rt.iuran.index')
                ->with('error', 'Gagal menambahkan data!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Iuran  $iuran
     * @return \Illuminate\Http\Response
     */
    public function show(Iuran $iuran)
    {
        return view('rt.iuran.detail_iuran', [
            'iuran' => $iuran,
            'jenis_iuran' => JenisIuran::all(),
        ]);
    }

    public function pembayaran(Iuran $iuran)
    {
        $warga = Warga::where('rt', auth()->user()->id_rt)
            ->where('status_warga', 0)
            ->where('active', 1)
            ->get();
        // dd($iuran->pembayarans);
        return view('rt.iuran.pembayaran_iuran', [
            'iuran' => $iuran,
            'warga' => $warga,
            'jenis_iuran' => JenisIuran::all(),
        ]);
    }

    public function storePembayaran(Request $request)
    {
        $validatedData = $request->validate([
            'id_iuran' => 'required',
            'id_warga' => 'required',
            'nik' => 'required',
            'jumlah_bayar' => 'integer',
        ]);

        try {
            Pembayaran::create($validatedData);
            return redirect()->route('rt.iuran.pembayaran', $request->id_iuran)
                ->with('success', 'Pembayaran berhasil!');
        } catch (\Exception $e) {
            return redirect()->route('rt.iuran.index')
                ->with('error', 'Pembayaran gagal!');
        }
    }

    public function destroyPembayaran($id)
    {
        $data = Pembayaran::find($id);
        $data->delete();
        return back()->with('success', 'Pembayaran berhasil dihapus!');
    }

    public function edit(Iuran $iuran)
    {
        return view('rt.Iuran.edit_iuran', [
            'iuran' => $iuran,
            'jenis_iuran' => JenisIuran::all(),
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

        return redirect()->route('rt.iuran.index')->with('success', 'Data berhasil diubah!');
    }

    public function destroy(Iuran $iuran)
    {
        try {
            $iuran->delete();
            return redirect()->route('rt.iuran.index')
                ->with('success', 'data berhasil dihapus!');
        } catch (\Exception $e) {
            return redirect()->route('rt.iuran.index')
                ->with('error', 'Gagal menghapus data!');
        }
    }



    public function show_warga(Request $request)
    {
        // $jenazah= Warga::where('nik', $warga->nik)->first();
        $jenazah = Warga::with('pekerjaan')->select('id_warga', 'nama_lengkap', 'pekerjaan')
            ->where('nik', $request->id)
            ->where('rt', auth()->id())
            ->where('status_warga', 0)
            ->first();
        if ($jenazah) {
            return response()->json(['success' => 'Data ditemukan.', 'data' => $jenazah]);
        }
        return response()->json(['success' => 'Data tidak ditemukan.', 'data' => $jenazah]);
        // dd($jenazah);
    }
}
