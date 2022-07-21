<?php

namespace App\Http\Controllers\RT;

use PDF;
use App\Models\Surat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SuratRTController extends Controller
{
    // untuk menampilkan data pengjuan sesuai dengan rt
    public function index()
    {
        $surat = Surat::where('rt', auth()->user()->id_rt)->where('status_tandatangan', '!=', 2)->latest()->get();
        return view('RT.surat.surat', [
            'surat' => $surat,
        ]);
    }

    public function nomorsurat()
    {
        // return CreateNomorSuratRW('SKE');
        $surat = Surat::with('wargas')->where('rt', auth()->user()->id_rt)
            ->where('nomor_surat', '!=', null)
            // ->where('status_tandatangan', 1)
            ->whereIn('status_tandatangan', [0, 1])
            ->orderBy('nomor_surat', 'asc')
            ->get();
        // dd($surat);
        // return $surat;
        return view('rt.surat.nomor_surat', [
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
        // dd($propertie_surat);
        if ($surat->status_tandatangan == 2 and $surat->status_surat == 3) {
            $surat->update(['status_surat' => 4, 'nomor_surat' => CreateNomorSuratRT('SKE')]);
        } else if ($surat->status_tandatangan == 1 and $surat->status_surat == 0) {
            $surat->update(['status_surat' => 1, 'propertie_surat' => $propertie_surat, 'nomor_surat' => CreateNomorSuratRT('SKE')]);
        }
    }

    public function tolakSuratKeterangan(Surat $surat)
    {
        $surat->update(['status_surat' => 2]);
    }

    public function printSuratKeterangan(Surat $surat)
    {
        //

        $surat = $surat;
        //jika data tidak ditemukan
        if (!$surat and $surat->status_surat == 0) {
            return redirect()->route('rt.surat.index')
                ->with('error', 'Print Gagal! Data tidak temukan');
        }

        // $data = $dataKematian->get();
        $surat['rt'] = auth()->user();
        $surat['rw'] = auth()->user()->rw_rel;
        $pdf = PDF::loadview('rt.surat.surat_keterangan_pdf', ['surat' => $surat]);
        return $pdf->stream();
    }

    public function cekSurat()
    {
        // $surat = Surat::where('nomor_surat', $request->qr_code)->first();
        return view('rt.surat.cek_surat');
        // return response()->json(['success' => 'Data tidak ditemukan.', 'data' => $request->id]);0
    }
    public function validasiCode(Request $request)
    {
        $surat = Surat::where('nomor_surat', $request->qr_code)->first();
        if($surat == null){
            return response()->json(['error' => 'Data tidak ditemukan.', ]);
        }
        return $surat;
    }

  
}
