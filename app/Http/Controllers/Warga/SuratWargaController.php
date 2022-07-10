<?php

namespace App\Http\Controllers\Warga;

use App\Models\Surat;
use App\Models\Warga;
// use Barryvdh\DomPDF\PDF;
use PDF;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\WargaMeninggal as Kematian;

class SuratWargaController extends Controller
{
    //
    public function index()
    {
        $kematian = Kematian::orderBy('tgl_kematian', 'desc')->get();
        $surat = Surat::where('pengaju', auth()->user()->id_warga)->get();
        return view('warga.surat.surat', [
            'surat' => $surat,
        ]);
    }

    public function destroy(Surat $surat)
    {
        $delete = $surat->delete();
        if (!$delete) {
            return back()->with('error', 'Data gagal dihapus!');
        }
        return back()->with('success', 'Data berhasil dihapus!');
    }

    public function surat_keterangan()
    {
        $warga = auth()->user();
        //    dd($warga->agamas->agama);
        // getAgama($warga->agama);
        // return $surat->propertie_surat->jenis_surat;
        return view('warga.surat.surat_keterangan_form', compact('warga'));
    }

    public function surat_keterangan_store(Request $request)
    {
        // $validatedData = $request->validate([
        //     'nama_kegiatan' => 'required',
        //     'kategori_kegiatan' => 'required',
        //     'isi_kegiatan' => 'required',
        //     'foto_kegiatan' => 'image|file|max:2048',
        //     'tgl_mulai_kegiatan' => 'required',
        //     'tgl_selesai_kegiatan' => 'required'
        // ]);
        // $input = $request->only('jenis_surat');
        // dd(auth()->user());
        $input['nomor_surat'] = Str::random(5);
        $input['pengaju'] = $request->pengaju;
        $input['rt'] = auth()->user()->rt;
        $input['rw'] = auth()->user()->rw;
        $input['pengaju'] = $request->pengaju;
        $input['status_tandatangan'] = '1';
        $input['status_surat'] = '0';
        $input['jenis_surat'] = 'Surat Keterangan';
        $dataproperties['jenis_surat'] = $request->input('jenis_surat');
        $input['propertie_surat'] =  $dataproperties;
        Surat::create($input);
        // $surat = Surat::find('5');
        // dd($surat);
        // foreach($surat as $s) {
        //     echo $s->propertie_surat;
        //     };
        return  redirect()->route('warga.surat.index')->with('success', 'Pengajuan berhasil!!!<br/>Data anda sedang diproses');
    }
    public function print($id)
    {
        //Cetak surat
        $data = Surat::find($id);
        if (!$data) {
            return redirect()->route('warga.surat.form.surat_keterangan')
                ->with('error', 'Data tidak temukan');
        }

        $warga = $data->wargas;
        $warga['rt'] = auth()->user()->rt_rel;
        $warga['rw'] = auth()->user()->rw_rel;
        dd($warga);
        $pdf = PDF::loadview('warga.surat.surat_keterangan_pdf', compact('data', 'warga'));
        return $pdf->stream();
    }
    public function show_pengaju(Request $request)
    {
        $jenazah = Warga::select('id_warga', 'no_kk', 'nama_lengkap', 'jenis_kelamin', 'pekerjaan', 'agama', 'tempat_lahir', 'tgl_lahir', 'alamat')
            ->where('nik', $request->id)

            ->where('rt', auth()->id())
            ->where('status_warga', 0)
            ->first();
        if ($jenazah) {
            return response()->json(['success' => 'Data ditemukan.', 'data' => $jenazah]);
        }
        return response()->json(['success' => 'Data tidak ditemukan.', 'data' => $jenazah]);
    }
}
