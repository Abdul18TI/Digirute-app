<?php

namespace App\Http\Controllers;

use App\Models\Warga;
use App\Helper\Helpers;
use App\Models\Pekerjaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class WargaController extends Controller
{
    public function index()
    {
        $warga = Warga::all();
        // $warga = Warga::find(1);
        // dd($warga);
        return view(
            'RT.warga.warga-rt',
            [
                'warga' => $warga,
            ]
        );
    }

    // function menampilkan halaman tambah warga 
    public function create()
    {
        $warga = Warga::all();
        $data = Pekerjaan::all();
        return view(
            'RT.warga.warga-tambah-rt',
            [
                'warga' => $warga,
                'pekerjaan' => $data,
            ]
        );
    }

    //function tambah ke dalam database
    public function store(Request $request)
    {
        $validatedData = $request->except('_token');
        // $validatedData['tgl_lahir'] = strtotime($request->tgl_lahir);
        // $validatedData['tgl_keluar_kk'] = strtotime($request->tgl_keluar_kk);

        $validatedData = $request->validate([
            'no_kk' => 'required|numeric',
            'nik' => 'required|numeric|unique:wargas,nik',
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
            'status_akta_kelahiran' => 'required', //
            'akta_kelahiran' => 'nullable|numeric', //
            'jenis_kelamin' => 'required',
            'agama' => 'required',
            'golongan_darah' => 'required',
            'pendidikan' => 'required',
            'pekerjaan' => 'required',
            'status_hubungan' => 'required', //
            'status_perkawinan' => 'required', //
            'tgl_perkawinan' => 'nullable|date', //
            'status_akta_kawin' => 'required', //
            'akta_kawin' => 'nullable|numeric', //
            'status_akta_cerai' => 'required', //
            'akta_cerai' => 'nullable|numeric', //
            'tgl_cerai' => 'nullable|date', //
            'nomor_passport' => 'nullable|numeric|unique:wargas,nomor_passport', //
            'tgl_akhir_passport' => 'nullable|date', //
            'nomor_kitaskitap' => 'nullable|numeric|unique:wargas,nomor_kitaskitap', //
            'nik_ayah' => 'required', //
            'nama_ayah' => 'required', //
            'nik_ibu' => 'required', //
            'nama_ibu' => 'required', //
            'tgl_keluar_kk' => 'date', //
            'status_kelainan' => 'required', //
            'kelainan' => 'nullable', //
            'foto_warga' => 'image|file|max:2048', //
            'email_warga' => 'required',
            'no_hp_warga' => 'required',
            'rt' => 'required|nullable',
            'rw' => 'required|nullable'
        ]);

        if ($request->file('foto_warga')) {
            $validatedData['foto_warga'] = $request->file('foto_warga')->store('foto-warga');
        }

        try {
            Warga::create($validatedData);

            return redirect()->route('rt.warga.index')
                ->with('success', 'Data berhasil ditambah!');
        } catch (\Exception $e) {
            return redirect()->route('rt.warga.index')
                ->with('error', 'Gagal menambahkan data!');
        }

        // return Warga::create($validatedData);
    }

    public function edit(Warga $warga)
    {
        // dd($warga->all());
        $data = Pekerjaan::all();
        return view(
            'RT.warga.warga-edit-rt',
            [
                'warga' => $warga,
                'pekerjaan' => $data,
            ]
        );
    }

    public function update(Request $request, Warga $warga)
    {
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
            'status_akta_kelahiran' => 'required', //
            'akta_kelahiran' => 'nullable|numeric', //
            'jenis_kelamin' => 'required',
            'agama' => 'required',
            'golongan_darah' => 'required',
            'pendidikan' => 'required',
            'pekerjaan' => 'required',
            'status_hubungan' => 'required', //
            'status_perkawinan' => 'required', //
            'tgl_perkawinan' => 'nullable|date', //
            'status_akta_kawin' => 'required', //
            'akta_kawin' => 'nullable|numeric', //
            'status_akta_cerai' => 'required', //
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
            'status_kelainan' => 'required', //
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
        return redirect()->route('rt.warga.index')->with('success', 'Data berhasil diubah!');
    }

    public function destroy(Warga $warga)
    {
        // $warga->delete();
        // if ($warga->foto_warga) {
        //     Storage::delete($warga->foto_pengumuman);
        // }
        // return redirect()->route('pengumuman.index');

        try {
            $warga->delete();
            if ($warga->foto_warga) {
                Storage::delete($warga->foto_warga);
            }
            return redirect()->route('rt.warga.index')
                ->with('success', 'data berhasil dihapus!');
        } catch (\Exception $e) {
            return redirect()->route('rt.warga.index')
                ->with('error', 'Gagal menghapus data!');
        }
    }
}
