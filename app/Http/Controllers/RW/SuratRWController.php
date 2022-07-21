<?php

namespace App\Http\Controllers\RW;

use App\Models\Surat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SuratRWController extends Controller
{
    //
    public function index()
    {
        $surat = Surat::where('rw', auth()->user()->id_rw)
            ->where('status_tandatangan', 1)
            ->orWhere('status_tandatangan', 2)
            ->latest()
            ->get();
        return view('RW.surat.surat', [
            'surat' => $surat,
            'title' => "Pengajuan Surat"
        ]);
    }

    public function nomorsurat()
    {
        // return CreateNomorSuratRW('SKE');
        $surat = Surat::with('wargas')->where('rw', auth()->user()->id_rw)
        ->where('nomor_surat', '!=', null)
        // ->where('status_tandatangan', 1)
            ->Where('status_tandatangan', 2)
            ->orderBy('nomor_surat', 'asc')
            ->get();
            // dd($surat);
            // return $surat;
        return view('RW.surat.nomor_surat', [
            'surat' => $surat,
            'title' => "Nomor Surat RW"
        ]);
    }

    public function detailSuratKeterangan(Surat $surat)
    {
        $surat = $surat;
        $title = "Pengajuan Surat";
        return view('RW.surat.surat_keterangan_detail', compact('surat', 'title'));
    }
    public function prosesSurat(Request $request, Surat $surat)
    {
        $proses =  $request->input('proses');
        // dd($proses);
        if ($proses == 'terima') {
            $this->approveSuratKeterangan($surat);
            return redirect()->route('rw.surat.index')->with('success', 'Surat telah disetuji!');
        } elseif ($proses == 'tolak') {
            $this->tolakSuratKeterangan($surat);
            return redirect()->route('rw.surat.index')->with('success', 'Surat ditolak!');
        }
    }
    public function approveSuratKeterangan(Surat $surat)
    {
        $propertie_surat = $surat->propertie_surat;
        $propertie_surat->tanggal_approve_rw = now();
        // dd($propertie_surat);
        
        $surat->update(['status_surat' => 4, 'propertie_surat' => $propertie_surat]);
    }

    public function tolakSuratKeterangan(Surat $surat)
    {
        // dd($propertie_surat);
        $surat->update(['status_surat' => 2]);
    }

    // public function printSuratKeterangan(Surat $surat)
    // {
    //     //

    //     $surat = $surat;
    //     //jika data tidak ditemukan
    //     if (!$surat and $surat->status_surat == 0) {
    //         return redirect()->route('rw.surat.index')
    //             ->with('error', 'Print Gagal! Data tidak temukan');
    //     }

    //     // $data = $dataKematian->get();
    //     $surat['rt'] = auth()->user();
    //     $surat['rw'] = auth()->user()->rw_rel;
    //     $pdf = PDF::loadview('RW.surat.surat_keterangan_pdf', ['surat' => $surat]);
    //     return $pdf->stream();
    // }
}
