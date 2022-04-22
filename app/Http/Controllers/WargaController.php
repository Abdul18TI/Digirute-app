<?php

namespace App\Http\Controllers;

use App\Models\Warga;
use Illuminate\Http\Request;

class WargaController extends Controller
{
    public function home_rt()
    {
        $warga = Warga::all();
        return view(
            'RT.warga.warga-rt',
            [
                'warga' => $warga,
                'title' => 'Warga'
            ]
        );
    }

    // function menampilkan halaman tambah warga 
    public function tambah_warga_rt()
    {
        $warga = Warga::all();
        return view(
            'RT.warga.warga-tambah-rt',
            [
                'warga' => $warga,
                'title' => 'Tambah Data Warga'
            ]
        );
    }

    //function tambah ke dalam database
    public function add(Request $request)
    {
        $data = $request->except('_token');
        $data['tgl_lahir'] = strtotime($request->tgl_lahir);
        $data['tgl_keluar_kk'] = strtotime($request->tgl_keluar_kk);

        // dd($data);
        $request->validate([
            'no_kk' => 'required|numeric',
            'nik' => 'required|numeric|unique:wargas,nik',
            'no_kk' => 'required|numeric',
            // 'username' => 'required|unique:wargas,username',
            // 'password' => 'required|min:6',
            'alamat' => 'required',
            'kelurahan' => 'required',
            'kecamatan' => 'required',
            'kabupaten' => 'required',
            'provinsi' => 'required',
            'kode_pos' => 'nullable|numeric',
            'nama_lengkap' => 'required',
            'tempat_lahir' => 'required',
            'tgl_lahir' => 'required|date',
            'jenis_kelamin' => 'required',
            'agama' => 'required',
            'pekerjaan' => 'required',
            'golongan_darah' => 'required',
            'status_perkawinan' => 'required',
            'nomor_passport' => 'nullable|numeric',
            'nomor_kitaskitap' => 'nullable|numeric',
            'nama_ayah' => 'required',
            'nama_ibu' => 'required',
            'tgl_keluar_kk' => 'date',
            // 'foto_warga' => 'required',
            //eTime('tanggal_tambah'
            // 'email_warga' => 'email:rfc,dns',
            // 'no_hp_warga' => 'required',
            'rt' => 'required',
            'rw' => 'required'
        ]);
        Warga::create($data);
        return redirect()->route('rt.warga.home');
    }

    public function edit_warga_rt(Warga $warga)
    {
        // dd($warga->all());
        return view(
            'RT.warga.warga-edit-rt',
            [
                'warga' => $warga,
                'title' => 'Edit Data Warga'
            ]
        );
    }

    public function update(Request $request, $id)
    {
        $data = $request->except(['_token', '_method']);
        $data['tgl_lahir'] = strtotime($request->tgl_lahir);
        $data['tgl_keluar_kk'] = strtotime($request->tgl_keluar_kk);
        Warga::where('id_warga', $id)->update($data);
    }
}
