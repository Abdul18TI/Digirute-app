<?php

namespace App\Http\Controllers\RW;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RwController extends Controller
{
    public function home_rw()
    {
        return view('RW.dashboard.home', [
            "title" => "Dashboard"
        ]);
    }
}
