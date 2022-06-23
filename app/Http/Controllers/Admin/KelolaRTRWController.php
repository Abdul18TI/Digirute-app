<?php

namespace App\Http\Controllers\Admin;

use App\Models\rw;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class KelolaRTRWController extends Controller
{

    public function index()
    {
        $kelola_rtrw = rw::all();
        return view('Admin.Kelola_rtrw.kelola_rtrw', [
            'kelola_rtrw' => $kelola_rtrw,
            "title" => "Kelola RTRW"
        ]);
    }
}
