<?php

namespace App\Helper;

use App\Models\Pekerjaan;



class Helpers
{
    #Get Category Data From Category Model
    static function get_catdata()
    {
        $catdata = Pekerjaan::all();
        return $catdata;
    }
}
