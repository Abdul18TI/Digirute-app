<?php

namespace App\Http\Controllers\RT;

use App\Models\Warga;
use App\Models\Kegiatan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\WargaMeninggal as Kematian;

class WargaMeninggalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $kematian = Kematian::all();
        return view('RT.kematian.tabel_kematian', [
            'kematian' => $kematian,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $kategori_kegiatan = KategoriKegiatan::all();
        return view('RT.kematian.tambah_kematian');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'warga' => 'required|unique:warga_meninggal,warga',
            'nik' => 'required|exists:wargas,nik',
            'nama_lengkap' => 'required',
            'jenis_kelamin' => 'required',
            'agama' => 'required',
            'pekerjaan' => 'required',
            'tempat_lahir' => 'required',
            'tgl_lahir' => 'required',
            'alamat' => 'required',
            'tempat_kematian' => 'required',
            'sebab_kematian' => 'required',
            'tgl_kematian' => 'required',
            'nik_pelapor' => 'required',
            'nama_pelapor' => 'required',
            'tempat_lahir_pelapor' => 'required',
            'tgl_lahir_pelapor' => 'required',
        ], [
            'nik.exists'    => 'NIK tidak terdaftar',
            'warga.unique'    => 'Data ini sudah terdata meninggal dunia',
        ]);
        $dataentry = $request->only('warga', 'sebab_kematian', 'tempat_kematian', 'tgl_kematian', 'nik_pelapor', 'nama_pelapor', 'tempat_lahir_pelapor', 'tgl_lahir_pelapor');
        $dataWargaSame = Warga::find($request->warga);
        if (is_null($dataWargaSame)) {
            return redirect()->route('rt.kematian.tambah')
                ->with('error', 'Data ini tidak termasuk warga anda!');
        }
        try {
            //Memasukan data inputan kedalam tabel kematian pada database
            $insertData = Kematian::create($dataentry);
            //mengembalikan ke halaman rt.kematian.index
            if ($insertData) {
                return redirect()->route('rt.kematian.index')
                    ->with('success', 'Data berhasil ditambah!');
                // return "data masuk";
            }
            //     // return "data gagal";
            return redirect()->route('rt.kematian.index')
                ->with('error', 'Gagal menambahkan data!');
        } catch (\Exception $e) {
            //mengembalikan ke halaman rt.kematian.index dengan mengirimkan pesan
            return redirect()->route('rt.kematian.index')
                ->with('error', 'Gagal menambahkan data!' . $e);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\WargaMeninggal  $wargaMeninggal
     * @return \Illuminate\Http\Response
     */
    public function show(Kematian $kematian)
    {
        //
        $dataKematian = Kematian::find($kematian->warga)->first();
        // dd($dataKematian->wargas);
    //   return response()->json([ 'data' => $dataEntry]);
        return view('RT.kematian.detail_kematian', [
            'kematian' => $dataKematian,
        ]);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\WargaMeninggal  $wargaMeninggal
     * @return \Illuminate\Http\Response
     */
    public function edit(Kematian $kematian)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\WargaMeninggal  $wargaMeninggal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kematian $kematian)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\WargaMeninggal  $wargaMeninggal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kematian $kematian)
    {
        //
        // dd($kematian);
        
        try {
            $kematian->delete();
            return redirect()->route('rt.kematian.index')
            ->with('success', 'data berhasil dihapus!');
        } catch (\Exception $e) {
            return redirect()->route('rt.kematian.index')
            ->with('error', 'Gagal menghapus data!');
        }

    }

    // public function show_jenazah(Warga $warga){
    public function show_warga(Request $request)
    {
        // $jenazah= Warga::where('nik', $warga->nik)->first();
        $jenazah = Warga::select('id_warga','nama_lengkap', 'jenis_kelamin', 'pekerjaan', 'agama', 'tempat_lahir', 'tgl_lahir', 'alamat')
            ->where('nik', $request->id)
            ->where('rt', auth()->id())
            ->first();
            dd($jenazah->pekerjaan);
        if ($jenazah) {
            return response()->json(['success' => 'Data ditemukan.', 'data' => $jenazah]);
        }
        return response()->json(['success' => 'Data tidak ditemukan.', 'data' => $jenazah]);
        // dd($jenazah);
    }
}