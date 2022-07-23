<?php

namespace App\Http\Controllers\RT;

use App\Models\Warga;
use App\Models\WargaPindah;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class WargaPindahController extends Controller
{
    public function index()
    {
        $pindah = WargaPindah::orderBy('tanggal_pindah', 'desc')->get();
        return view('RT.pindah.tabel_pindah', [
            'pindah' => $pindah,
        ]);
    }

    public function create()
    {
        return view('RT.pindah.tambah_pindah');
    }

    public function store(Request $request)
    {
        //
        $request->validate([
            'warga' => 'required|unique:warga_pindah,warga',
            'nik' => 'required|exists:wargas,nik',
            'dokumen_pindah' => 'required|mimes:pdf,jpeg,png,jpg',
            'nama_warga' => 'required',
            'alamat_pindah' => 'required',
        ], [
            'nik.exists'    => 'NIK tidak terdaftar',
            'warga.unique'    => 'Data ini sudah terdata warga pindah',
        ]);


        $dataentry = $request->only('warga', 'dokumen_pindah', 'alamat_pindah', 'tanggal_pindah');

        if ($request->file('dokumen_pindah')) {
            $custom_file_name = time() . '-' .  $request->warga . '-' . $request->file('dokumen_pindah')->getClientOriginalName();
            $dataentry['dokumen_pindah'] = $request->file('dokumen_pindah')->storeAs('dokumen_pindah', $custom_file_name);
        }

        $dataWargaSame = Warga::find($request->warga);
        if (is_null($dataWargaSame)) {
            return redirect()->route('rt.wargapindah.create')
                ->with('error', 'Data ini tidak termasuk warga anda!');
        }
        try {
            // Memasukan data inputan kedalam tabel kematian pada database
            WargaPindah::create($dataentry);
            $dataWargaSame->update(['status_warga' => 3]);
            $dataWargaSame->update(['active' => 0]);
            return redirect()->route('rt.wargapindah.index')
                ->with('success', 'Berhasil menambahkan data!');
        } catch (\Exception $e) {
            // mengembalikan ke halaman rt.wargapindah.index dengan mengirimkan pesan

            return redirect()->route('rt.wargapindah.index')
                ->with('error', 'Gagal menambahkan data!' . $e);
        }
    }

    public function destroy(WargaPindah $wargapindah)
    {
        try {
            $warga = Warga::find($wargapindah->warga)->update(['status_warga' => 0, 'active' => 1]);
            if ($wargapindah->dokumen_pindah) {
                Storage::delete($wargapindah->dokumen_pindah);
            }
            $wargapindah->delete();
            return redirect()->route('rt.wargapindah.index')
                ->with('success', 'data berhasil dihapus!');
        } catch (\Exception $e) {
            return redirect()->route('rt.wargapindah.index')
                ->with('error', 'Gagal menghapus data!');
        }
    }
}
