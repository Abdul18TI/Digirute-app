<?php

namespace App\Http\Controllers\Warga;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Pekerjaan;
use App\Models\Pendidikan;
use App\Models\Kabupaten;
use App\Models\Kecamatan;
use App\Models\Kelurahan;
use App\Models\Provinsi;
use App\Models\Status_hubungan;
use App\Models\Warga;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;

class ProfileWargaController extends Controller
{

    public function show($id)
    {
        $warga = Warga::where('id_warga', $id)->first();
        // dd($rw);
        $keluarga = Warga::with('hubungans')->where('no_kk', $warga->no_kk)->whereNotIn('nik', [$warga->nik])->get();
        // dd($keluarga);

        return view('Warga.Profile.profile-warga-tes', [
            'warga' => $warga,
            'keluarga' => $keluarga,
        ]);
    }

    public function edit(Warga $profilewarga)
    {
        $data = Pekerjaan::all();
        $hubungan = Status_hubungan::all();
        $pendidikan = Pendidikan::all();
        $datakab = Kabupaten::all();
        $datakec = Kecamatan::all();
        $datakel = Kelurahan::all();
        $datapro = Provinsi::all();
        // dd($profilewarga);
        // dd($profilewarga->kecamatans);
        // $rw = rw::with('identitas_rw')->where('id_warga', $id)->get();
        // $datadiri = Warga::where('id_warga', $rw->identitas_rw->id_warga)->firtst();
        return view('Warga.Profile.edit_profile_warga', [
            'warga' => $profilewarga,
            'pekerjaan' => $data,
            'hubungan' => $hubungan,
            'pendidikan' => $pendidikan,
            'kabupaten' => $datakab,
            'kecamatan' => $datakec,
            'kelurahan' => $datakel,
            'provinsi' => $datapro,
        ]);
    }

    public function update(Request $request, Warga $profilewarga)
    {
        // dd($request->id);
        if ($request->username) {
            $validatedData = $request->validate([
                'username' => 'required|unique:rws,username'
            ]);
            Warga::where('id_warga', $request->id)
                ->update($validatedData);
            return redirect()->route('warga.profilewarga.show', $profilewarga->id_warga)->with('success', 'Username berhasil diubah!');
        }

        if ($request->password) {
            $validatedData = $request->validate([
                'password' => 'required'
            ]);
            $validatedData['password'] = Hash::make($request->password);
            Warga::where('id_warga', $request->id)
                ->update($validatedData);
            return redirect()->route('warga.profilewarga.show', $profilewarga->id_warga)->with('success', 'Password berhasil diubah!');
        }

        $validatedData = $request->only(['email_warga', 'no_hp_warga', 'foto_warga']);
       
        if ($request->file('foto_warga')) {
            Storage::delete($request->oldImage);
            $validatedData['foto_warga'] = $request->file('foto_warga')->store('foto-warga');
        }

        warga::where('id_warga', $profilewarga->id_warga)
            ->update($validatedData);
        return redirect()->route('warga.profilewarga.show', $profilewarga->id_warga)->with('success', 'Data berhasil diubah!');
    }
}
