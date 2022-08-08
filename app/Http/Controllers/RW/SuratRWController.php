<?php

namespace App\Http\Controllers\RW;

use PDF;
use App\Models\rt;
use App\Models\rw;
use App\Models\Surat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

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
        $tandatanganrw = rand(1, 9999) . '-' . $surat->nomor_surat . '-' . auth()->user()->id_rw . '-' . str_replace(' ', '', now());
        // $surat->tanda_tangan_rt =  $tandatanganrw;
        // $surat->save();
        $surat->update(['status_surat' => 4, 'propertie_surat' => $propertie_surat, 'tanda_tangan_rw' =>  $tandatanganrw]);
    }

    public function tolakSuratKeterangan(Surat $surat)
    {
        // dd($propertie_surat);
        $surat->update(['status_surat' => 2]);
    }

    public function printSuratKeterangan(Surat $surat)
    {
        //

        $surat = $surat;
        //jika data tidak ditemukan
        if (!$surat and $surat->status_surat == 0) {
            return redirect()->route('rw.surat.index')
                ->with('error', 'Print Gagal! Data tidak temukan');
        }

        // echo $surat->id_rt;
        // $data = $dataKematian->get();
        $surat['rt'] = rt::where('id_rt', $surat->id_rt)->get();
        $surat['rw'] = auth()->user();
        // var_dump($surat);
        // die();
        $surat['ttdrt'] = null;
        if ($surat->tanda_tangan_rt != null) {
            $ttdrt = base64_encode(QrCode::format('svg')->size(100)->errorCorrection('H')->generate($surat->tanda_tangan_rt));
            $surat['ttdrt'] = $ttdrt;
        }

        $surat['ttdrw'] = null;
        if ($surat->tanda_tangan_rw != null) {
            $ttdrw = base64_encode(QrCode::format('svg')->size(100)->errorCorrection('H')->generate($surat->tanda_tangan_rw));
            $surat['ttdrw'] = $ttdrw;
        }
        // dd(auth()->user());
        // dd($surat->load('rts'));
        // return view('surat.surat_keterangan_pdf', ['surat' => $surat]);
        // $pdf = PDF::loadview('RW.Surat.surat_keterangan_pdf', ['surat' => $surat]);
        // return $pdf->stream();
    }

    // public function printSuratKeterangan(Surat $surat)
    // {
    //     //

    //     $surat = $surat;
    //     // dd($surat);
    //     //jika data tidak ditemukan
    //     if (!$surat and $surat->status_surat == 0) {
    //         return redirect()->route('rt.surat.index')
    //         ->with('error', 'Print Gagal! Data tidak temukan');
    //     }

    //     // $data = $dataKematian->get();
    //     $surat['rt'] = auth()->user();
    //     $surat['rw'] = auth()->user()->rw_rel;
    //     $ttdrt = base64_encode(QrCode::format('svg')->size(100)->errorCorrection('H')->generate($surat->tanda_tangan_rt));
    //     $ttdrw = base64_encode(QrCode::format('svg')->size(100)->errorCorrection('H')->generate($surat->tanda_tangan_rt));
    //     $surat['ttdrt'] = $ttdrt;
    //     $surat['ttdrw'] = $ttdrw;
    //     // dd($surat);
    //     $pdf = PDF::loadview('surat.surat_keterangan_pdf', ['surat' => $surat]);
    //     return $pdf->stream();
    // }

    public function cekSurat()
    {
        // $surat = Surat::where('nomor_surat', $request->qr_code)->first();
        return view('rw.surat.cek_surat');
        // return response()->json(['success' => 'Data tidak ditemukan.', 'data' => $request->id]);0
    }
    public function validasiCode(Request $request)
    {
        $surat = Surat::where('tanda_tangan_rt', $request->qr_code)
            ->orWhere('tanda_tangan_rw', $request->qr_code)
            ->first();

        if ($surat == null) {
            return response()->json(['error' => 'Data tidak ditemukan.',]);
        }
        return $surat;
    }
}
