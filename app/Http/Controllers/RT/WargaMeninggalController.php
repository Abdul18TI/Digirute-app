<?php

namespace App\Http\Controllers\RT;

use PDF;
use App\Models\Surat;
// use Barryvdh\DomPDF\PDF;
use App\Models\Warga;
use App\Models\Kegiatan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\WargaMeninggal as Kematian;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

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
        $kematian = Kematian::orderBy('tgl_kematian', 'desc')->get();
        // $kematian = Kematian::all();
        // dd($kematian);
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
            'hubungan_jenazah' => 'required',
            'nama_pelapor' => 'required',
            'tempat_lahir_pelapor' => 'required',
            'tgl_lahir_pelapor' => 'required',
        ], [
            'nik.exists'    => 'NIK tidak terdaftar',
            'warga.unique'    => 'Data ini sudah terdata meninggal dunia',
        ]);
        $dataentry = $request->only('warga', 'sebab_kematian', 'tempat_kematian', 'tgl_kematian', 'nik_pelapor', 'hubungan_jenazah', 'nama_pelapor', 'tempat_lahir_pelapor', 'tgl_lahir_pelapor');
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
                $dataWargaSame->update(['status_warga' => 1]);
                $dataWargaSame->update(['active' => 0]);
                return redirect()->route('rt.kematian.index')
                    ->with('success', 'Data berhasil ditambah!');
            }
            return redirect()->route('rt.kematian.index')
                ->with('error', 'Gagal menambahkan data!');
        } catch (\Exception $e) {
            //mengembalikan ke halaman rt.kematian.index dengan mengirimkan pesan
            return redirect()->route('rt.kematian.index')
                ->with('error', 'Gagal menambahkan data!' . $e);
        }
    }

    public function store_surat($request, $id_meniggal)
    {
        // $validatedData = $request->validate([
        //     'jenis_surat' => 'required',
        //     'nik' => 'required|exists:wargas,nik',
        //     'pengaju' => 'required|exists:wargas,id_warga',
        // ]);
        // // $input = $request->only('jenis_surat');
        // // dd(auth()->user());
        $input['pengaju'] = $request->warga;
        $input['rt'] = auth()->user()->id_rt;
        $input['rw'] = auth()->user()->id_rw;
        $input['status_tandatangan'] = '1';
        $input['status_surat'] = '0';
        $dataproperties['id_meniggal'] = $id_meniggal;
        $input['jenis_surat'] = 'Surat Keterangan Kematian';
        $input['propertie_surat'] = $dataproperties;
        // dd($input);
        // $dataproperties['jenis_surat'] = $request->input('jenis_surat');
        // $input['propertie_surat'] =  $dataproperties;
        return Surat::create($input);
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
        // $dataKematian = Kematian::find($kematian->warga)->first();
        // dd($dataKematian->wargas);
        //   return response()->json([ 'data' => $dataEntry]);
        return view('RT.kematian.detail_kematian', [
            'kematian' => $kematian,
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

        // $kematian->wargas->status_warga = 0;
        // $kematian->save();
        // $dataWargaSame->update(['status_warga' => 1]);

        try {
            $warga = Warga::find($kematian->warga);
            $warga->status_warga = 0;
            $warga->save();
            // dd($kematian->no_surat);
            if($kematian->no_surat != null){
                $surat = Surat::where('id_surat', $kematian->no_surat)->first();
                $surat->delete();
            }
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
        $jenazah = Warga::with('pekerjaans')->select('id_warga', 'nama_lengkap', 'jenis_kelamin', 'pekerjaan', 'agama', 'tempat_lahir', 'tgl_lahir', 'alamat')
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

    public function requestSurat($kematian)
    {
        //

        $dataKematian = Kematian::find($kematian);
        // dd($dataKematian);
        //jika data tidak ditemukan
        if (!$dataKematian) {
            return redirect()->route('rt.kematian.index')
                ->with('error', 'Print Gagal! Data tidak temukan');
        }

        $input['pengaju'] = $dataKematian->warga;
        $input['rt'] = auth()->user()->id_rt;
        $input['rw'] = auth()->user()->rw_rel->id_rw;
        $input['status_tandatangan'] = '0';
        $input['status_surat'] = '4';
        $input['nomor_surat'] = CreateNomorSuratRT('SKM');
        $input['jenis_surat'] = 'Surat Keterangan Kematian';
        $dataproperties['id_surat_meninggal'] = $dataKematian->id;
        $input['propertie_surat'] = $dataproperties;
        $surat = Surat::create($input);
        
        $dataKematian->no_surat = $surat->id_surat;
        $dataKematian->cetak_surat = '1';
        $dataKematian->save();

        return redirect()->route('rt.kematian.index')
            ->with('success', 'Pengajuan surat berhasil!');
        // dd($dataKematian['rt']);
        //    return view('rt.kematian.surat_kematian_pdf', ['kematian' => $dataKematian]);
        // $pdf = PDF::loadview('rt.kematian.surat_kematian_pdf', ['kematian' => $dataKematian]);
        // return $pdf->stream();
    }

    public function print($kematian)
    {
        //
        $qrcode = base64_encode(QrCode::format('svg')->size(100)->errorCorrection('H')->generate('001/RT01/RW01/SKM/VII/2022'));
        $dataKematian = Kematian::find($kematian);
// dd($qrcode);
        //jika data tidak ditemukan
        if (!$dataKematian) {
            return redirect()->route('rt.kematian.index')
                ->with('error', 'Print Gagal! Data tidak temukan');
        }

        // $data = $dataKematian->get();
        $dataKematian['rt'] = auth()->user();
        $dataKematian['rw'] = auth()->user()->rw_rel;
        $dataKematian['qrcode'] = $qrcode;
        // dd($dataKematian['rt']);
        //    return view('rt.kematian.surat_kematian_pdf', ['kematian' => $dataKematian]);
        $pdf = PDF::loadview('rt.kematian.surat_kematian_pdf', ['kematian' => $dataKematian]);
        return $pdf->stream();
    }
}
