<?php

namespace App\Http\Controllers\Warga;

use App\Http\Controllers\Controller;
use App\Models\rt;
use App\Models\rw;
use App\Models\Warga;
use Illuminate\Http\Request;

class OtherController extends Controller
{
    //
    public function rtrw()
    {
        // $warga = Warga::with('rt_rel')->first();
        $warga = warga::with('rt_rel.rw_rel')->first();
        return $warga;
    }
}
