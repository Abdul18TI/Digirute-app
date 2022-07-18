<?php

namespace App\Http\Controllers\RW;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\rw;
use App\Models\Warga;
use App\Models\Pekerjaan;
use App\Models\Pendidikan;
use App\Models\Kabupaten;
use App\Models\Kecamatan;
use App\Models\Kelurahan;
use App\Models\Provinsi;
use App\Models\Status_hubungan;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;

class ProfileRWController extends Controller
{
    // public function index()
    // {
    //     $rw = rw::with('identitas_rw')->first();

    //     $keluarga = Warga::where('no_kk', $rw->identitas_rw->no_kk)->whereNotIn('nik', [$rw->identitas_rw->nik])->get();
    //     // dd($rw);

    //     return view('RW.ProfileRW.profile-rw-tes', [
    //         'rw' => $rw,
    //         'keluarga' => $keluarga,
    //         "title" => "profile-rw"
    //     ]);
    // }

    public function show($id)
    {
        $rw = rw::with('identitas_rw')->where('id_rw', $id)->first();
        // dd($r\w->id_rw);
        $keluarga = Warga::where('no_kk', $rw->identitas_rw->no_kk)->whereNotIn('nik', [$rw->identitas_rw->nik])->get();

        return view('RW.ProfileRW.profile-rw-tes', [
            'rw' => $rw,
            'keluarga' => $keluarga,
            "title" => "profile-rw"
        ]);
    }

    public function edit(rw $profile)
    {
        $data = Pekerjaan::all();
        $hubungan = Status_hubungan::all();
        $pendidikan = Pendidikan::all();
        $datakab = Kabupaten::all();
        $datakec = Kecamatan::all();
        $datakel = Kelurahan::all();
        $datapro = Provinsi::all();
        // dd($profileRT);
        // $rt = rt::with('identitas_rt')->where('id_rt', $profileRT->id_warga)->get();
        $rw = Warga::where('id_warga', $profile->id_warga)->first();
        // dd($profile);
        // $rw = rw::with('identitas_rw')->where('id_rw', $id)->get();
        // $datadiri = Warga::where('id_warga', $rw->identitas_rw->id_warga)->firtst();
        return view('RW.profileRW.edit_profile', [
            'rw' => $profile,
            'warga' => $rw,
            'pekerjaan' => $data,
            'hubungan' => $hubungan,
            'pendidikan' => $pendidikan,
            'kabupaten' => $datakab,
            'kecamatan' => $datakec,
            'kelurahan' => $datakel,
            'provinsi' => $datapro,
            'title' => 'edit-profile'
        ]);
    }

    public function update(Request $request, Warga $warga)
    {
        // dd($request->id);
        if ($request->username) {
            $validatedData = $request->validate([
                'username' => 'required|unique:rws,username'
            ]);
            rw::where('id_rw', $request->id)
                ->update($validatedData);
            return redirect()->route('rw.profile.show', $request->id)->with('success', 'Username berhasil diubah!');
        }

        if ($request->password) {
            $validatedData = $request->validate([
                'password' => 'required'
            ]);
            $validatedData['password'] = Hash::make($request->password);
            rw::where('id_rw', $request->id)
                ->update($validatedData);
            return redirect()->route('rw.profile.show', $request->id)->with('success', 'Password berhasil diubah!');
        }

        $validatedData = $request->except(['_token', '_method']);
        $validatedData = $request->validate([
            'no_kk' => 'required|numeric',
            'nik' => 'required|numeric',
            // 'username' => 'required|unique:wargas,username',
            // 'password' => 'required|min:6',
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
            'rw' => 'required|nullable'
        ]);

        // $validatedData['password'] = Hash::make($request->password);

        if ($request->file('foto_warga')) {
            Storage::delete($request->oldImage);
            $validatedData['foto_warga'] = $request->file('foto_warga')->store('foto-warga');
        }

        warga::where('id_warga', $warga->id_warga)
            ->update($validatedData);
        return redirect()->route('rw.profile.show', $request->id)->with('success', 'Data berhasil diubah!');
    }
}
