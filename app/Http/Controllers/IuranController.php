<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IuranController extends Controller
{
    public function create()
    {
        return view('tambah_iuran', [
            'title' => 'tambah-iuran'
        ]);
    }

    public function store()
    {
    }
}
