<?php

namespace App\Http\Controllers\RW;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\rw;
use App\Models\Warga;
use App\Models\Pekerjaan;
use Illuminate\Support\Facades\Storage;

class ProfileRWController extends Controller
{
    public function index()
    {
        $rw = rw::with('identitas_rw')->first();

        $keluarga = Warga::where('no_kk', $rw->identitas_rw->no_kk)->whereNotIn('nik', [$rw->identitas_rw->nik])->get();
        // dd($rw);

        return view('RW.ProfileRW.profile-rw-tes', [
            'rw' => $rw,
            'keluarga' => $keluarga,
            "title" => "profile-rw"
        ]);
    }

    public function show($id)
    {
        $rw = rw::with('identitas_rw')->where('id_rw', $id)->get();

        // dd($rw);

        return view('RW.ProfileRW.profile-rw', [
            'rw' => $rw,
            "title" => "profile-rw"
        ]);
    }

    public function edit($rws)
    {
        $data = Pekerjaan::all();
        $profile = rw::with('identitas_rw')->where('id_rw', $rws)->first();
        // dd($profile);
        // $rw = rw::with('identitas_rw')->where('id_rw', $id)->get();
        // $datadiri = Warga::where('id_warga', $rw->identitas_rw->id_warga)->firtst();
        return view('RW.profileRW.edit_profile', [
            'warga' => $profile,
            'pekerjaan' => $data,
            // 'kategori_pengumuman' => Warga::all(),
            'title' => 'edit-pengumuman'
        ]);
    }

    public function update(Request $request, Warga $warga)
    {
        $validatedData = $request->except(['_token', '_method']);
        $validatedData = $request->validate([
            'no_kk' => 'required|numeric',
            'nik' => 'required|numeric',
            'username' => 'required|unique:wargas,username',
            'password' => 'required|min:6',
            'nama_kepala_keluarga' => 'required',
            'nokk_kepala_keluarga' => 'required|numeric',
            'status_hubungan_dalam_keluarga' => 'required|numeric',
            'alamat' => 'required',
            'kelurahan' => 'required',
            'kecamatan' => 'required',
            'kabupaten' => 'required',
            'provinsi' => 'required',
            'nama_dusun' => 'required',
            'kode_pos' => 'nullable|numeric',
            'nama_lengkap' => 'required',
            'tempat_lahir' => 'required',
            'tgl_lahir' => 'required|date',
            'akta_kelahiran' => 'nullable|numeric', //
            'jenis_kelamin' => 'required',
            'agama' => 'required',
            'golongan_darah' => 'required',
            'pendidikan' => 'required',
            'pekerjaan' => 'required',
            'status_hubungan' => 'required', //
            'status_perkawinan' => 'required', //
            'tgl_perkawinan' => 'nullable|date', //
            'akta_kawin' => 'nullable|numeric', //
            'akta_cerai' => 'nullable|numeric', //
            'tgl_cerai' => 'nullable|date', //
            'nomor_passport' => 'nullable|numeric', //
            'tgl_akhir_passport' => 'nullable|date', //
            'nomor_kitaskitap' => 'nullable|numeric', //
            'nik_ayah' => 'required', //
            'nama_ayah' => 'required', //
            'nik_ibu' => 'required', //
            'nama_ibu' => 'required', //
            'tgl_keluar_kk' => 'date', //
            'kelainan' => 'nullable', //
            'email_warga' => 'required',
            'no_hp_warga' => 'required',
            'rt' => 'required|nullable',
            'rw' => 'required|nullable'
        ]);

        if ($request->file('foto_warga')) {
            Storage::delete($request->oldImage);
            $validatedData['foto_warga'] = $request->file('foto_warga')->store('foto-warga');
        }

        warga::where('id_warga', $warga->id_warga)
            ->update($validatedData);
        return redirect()->route('profile.index')->with('success', 'Data berhasil diubah!');
    }
}
