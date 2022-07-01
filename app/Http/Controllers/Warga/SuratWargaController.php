<?php

namespace App\Http\Controllers\Warga;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SuratWargaController extends Controller
{
    //
    public function surat_pengantar(){
        return view('warga.surat.surat_pengantar_form');
    }
}
