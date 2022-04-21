<?php

namespace App\Http\Controllers;

use App\Models\Warga;
use Illuminate\Http\Request;

class WargaController extends Controller
{
    public function home_rt(){
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
                'title' => 'Warga'
            ]
        );
    }
    //function tambah ke dalam database
    public function add(Request $request)
    {
        $data = $request->except('_token');
        $data['tgl_lahir'] = strtotime($request->tgl_lahir);
        $data['tgl_keluar_kk'] = strtotime($request->tgl_keluar_kk);
        Warga::create($data);
        dd($data);
        // $request->validate([
        //     'title' => 'required|string',
        //     'small_thumbnail' => 'required|image|mimes:jpeg,jpg,png',
        //     'large_thumbnail' => 'required|image|mimes:jpeg,jpg,png',
        //     'trailer' => 'required|url',
        //     'movie'=>'required|url',
        //     'casts'=>'required|string',
        //     'categories'=>'required|string',
        //     'release_date'=>'required|string',
        //     'about'=>'required|string',
        //     'short_about'=>'required|string'
        // ]);
    }
}
