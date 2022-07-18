<?php

namespace App\Http\Controllers\RT;

use PDF;
use PDO;
use App\Models\Surat;
use App\Models\Warga;
use Illuminate\Http\Request;
use App\Models\WargaMeninggal;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

class SuratRTController extends Controller
{
    // untuk menampilkan data pengjuan sesuai dengan rt
    public function index()
    {
        $surat = Surat::where('rt', auth()->user()->id_rt)->latest()->get();
        return view('RT.surat.surat', [
            'surat' => $surat,
        ]);
    }

    public function detailSuratKeterangan(Surat $surat)
    {
        $surat = $surat;
        return view('RT.surat.surat_keterangan_detail', compact('surat'));
    }
    public function prosesSurat(Request $request, Surat $surat)
    {
        $proses =  $request->input('proses');
        if ($proses == 'terima') {
            $this->approveSuratKeterangan($surat);
            return redirect()->route('rt.surat.index')->with('success', 'Surat telah disetuji!');
        } elseif ($proses == 'tolak') {
            $this->tolakSuratKeterangan($surat);
            return redirect()->route('rt.surat.index')->with('success', 'Surat ditolak!');
        }
    }
    public function approveSuratKeterangan(Surat $surat)
    {
        $propertie_surat = $surat->propertie_surat;
        $propertie_surat->tanggal_approve_rt = now();
        $surat->update(['status_surat' => 1, 'nomor_surat' => CreateNomorSuratRT('SKE'), 'propertie_surat' => $propertie_surat]);
    }

    public function tolakSuratKeterangan(Surat $surat)
    {
        $surat->update(['status_surat' => 2]);
    }

    public function printSuratKeterangan(Surat $surat)
    {
        //

        $surat = $surat;
        // dd($surat);
        //jika data tidak ditemukan
        if (!$surat) {
            return redirect()->route('rt.surat.index')
            ->with('error', 'Print Gagal! Data tidak temukan');
        }

        // $data = $dataKematian->get();
        $surat['rt'] = auth()->user();
        $surat['rw'] = auth()->user()->rw_rel;
        // dd($surat);
        // dd($dataKematian['rt']);
        //    return view('rt.surat.surat_keterangan_pdf', ['surat' => $surat]);
        $pdf = PDF::loadview('rt.surat.surat_keterangan_pdf', ['surat' => $surat]);
        return $pdf->stream();
        // $dataKematian = WargaMeninggal::find('1');

        // //jika data tidak ditemukan
        // if (!$dataKematian) {
        //     return redirect()->route('rt.kematian.index')
        //     ->with('error', 'Print Gagal! Data tidak temukan');
        // }

        // // $data = $dataKematian->get();
        // $dataKematian['rt'] = auth()->user();
        // $dataKematian['rw'] = auth()->user()->rw_rel;
        // // dd($dataKematian['rt']);
        // //    return view('rt.kematian.surat_kematian_pdf', ['kematian' => $dataKematian]);
        // $pdf = PDF::loadview('rt.kematian.surat_kematian_pdf', ['kematian' => $dataKematian]);
        // return $pdf->stream();
    }
}
