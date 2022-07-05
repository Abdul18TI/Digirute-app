<?php

// namespace App\Helper;

use App\Models\Agama;
use App\Models\Pekerjaan;



// class Helpers
// {
    function getAgama($agama)
{
    $dataAgama = Agama::pluck('agama','id_agama');
    // dd($dataAgama);
    foreach ($dataAgama as $id => $name){
    echo '<option value='.$id.'>'.$name.'</option>';
    }
    foreach ($dataAgama as $a){
        return $agama == $a->id_agama ? $a : '-';
    }
    // return $catdata;
}
#Get Category Data From Category Model
function get_catdata()
{
    $catdata = Pekerjaan::all();
    return $catdata;
}

function FormatHP($nomorhp)
{
    //Terlebih dahulu kita trim dl
    $nomorhp = trim($nomorhp);
    //bersihkan dari karakter yang tidak perlu
    $nomorhp = strip_tags($nomorhp);
    // Berishkan dari spasi
    $nomorhp = str_replace(" ", "", $nomorhp);
    // bersihkan dari bentuk seperti  (022) 66677788
    $nomorhp = str_replace("(", "", $nomorhp);
    // bersihkan dari format yang ada titik seperti 0811.222.333.4
    $nomorhp = str_replace(".", "", $nomorhp);

    //cek apakah mengandung karakter + dan 0-9
    if (!preg_match('/[^+0-9]/', trim($nomorhp))) {
        // cek apakah no hp karakter 1-3 adalah +62
        if (substr(trim($nomorhp), 0, 3) == '+62') {
            $nomorhp = trim($nomorhp);
        }
        // cek apakah no hp karakter 1 adalah 0
        elseif (substr($nomorhp, 0, 1) == '0') {
            $nomorhp = '+62' . substr($nomorhp, 1);
        }
    }
    return $nomorhp;
}

//Function untuk mengubah tanggal ke dalam format indonesia
function tanggal_indo($tanggal)
{
    // dd(is_null($tanggal));
    // dd($tanggal);
    return is_null($tanggal) ? '-' : $tanggal->isoFormat('dddd, D MMMM Y');
}

//Function untuk mengubah tanggal waktu ke dalam format indonesia
function tanggal_waktu_indo($tanggal)
{
    return is_null($tanggal) ? '-' : $tanggal->isoFormat('dddd, D MMMM Y  H:mm');
}

function ConvertTanggal($tanggal)
{
    return is_null($tanggal) ? '-' : date('Y-m-d\TH:i', strtotime($tanggal));
}
 