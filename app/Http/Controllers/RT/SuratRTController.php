<?php

namespace App\Http\Controllers\RT;

use App\Models\Surat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Warga;

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

    public function detail_surat_keterangan(Surat $surat)
    {
        $data['wargas'] = $surat->with('wargas');
        // $data['surat'] = $surat;
        return $surat->load('wargas');
    }

    function CreateNomorSurat()
    {
        $no_rt = auth()->user()->no_rt;
        $no_rw = auth()->user()->rw_rel->no_rw;
        $jenis_surat = 'SKM';
        $tanggal_romawi = getRomawi(now()->month);
        $tahun = now()->year;
        $surat = Surat::selectRaw('RIGHT(nomor_surat,4) as tahun ,MAX(nomor_surat) as nomor_surat')
            ->where('rt', auth()->user()->id_rt)
            ->where('nomor_surat', 'like', '%RT' . $no_rt . '%')
            ->groupBy('tahun')
            ->having('tahun', $tahun)
            ->toBase()
            ->first();
        // echo $surat;
        if ($surat) {
            //Jika Nomor Surat Sudah Ada
            $nomorUrut = explode("/", $surat->nomor_surat)[0];
            $nomorSurat = '';
            $nomorSurat = sprintf("%03s", ++$nomorUrut) . "/RT${no_rt}/RW${no_rw}/${jenis_surat}/${tanggal_romawi}/${tahun}";
           ;
        } else {
            //Jika Nomor Surat Belum Ada
            $nomorSurat = "001/RT${no_rt}/RW${no_rw}/${jenis_surat}/${tanggal_romawi}/${tahun}";
        }
         return $nomorSurat;
    }
}
