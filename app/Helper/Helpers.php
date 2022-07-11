<?php

// namespace App\Helper;

use App\Models\Agama;
use App\Models\Pekerjaan;



// class Helpers
// {
function getAgama($agama)
{
    $dataAgama = Agama::pluck('agama', 'id_agama');
    // dd($dataAgama);
    foreach ($dataAgama as $id => $name) {
        echo '<option value=' . $id . '>' . $name . '</option>';
    }
    foreach ($dataAgama as $a) {
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

function setJenisSuratKeterangan($key)
{
    $jenis_surat = array(
        "s_ktp" => "Kartu Tanda Penduduk(KTP)",
        "s_kk" => "Kartu Keluarga (KK)",
        "s_skbb" => "Surat Keterangan Berkelakuan Baik (SKBB)",
        "s_keteranganusaha" => "Surat Keterangan Usaha",
        "s_keterangandomisiliusaha" => "Surat Keterangan Domisili Usaha",
        "s_domisili" => "Surat Domisili",
        "s_belumnikah" => "Surat Keterangan Belum Menikah",
        "s_lingkungan" => "Surat Keterangan Bersih Lingkungan",
        "s_ahliwaris" => "Surat Pernyataan dan Kuasa <p>Ahli Waris</p>",
        "s_lahir" => "Surat Keterangan Kelahiran",
        "s_mati" => "Surat Keterangan Kematian",
        "s_pengantarnikah" => "Surat Keterangan Pengantar Nikah (Model NA)",
        "s_miskin" => "Surat Keterangan Miskin / <p>Tidak Mampu</p>",
        "s_pendatang" => "Surat Keterangan Pendatang Baru",
        "s_keteranganpenghasilan" => "Surat Keterangan Penghasilan",
        "s_belumpunyarumah" => "Surat Belum Memiliki Rumah",
        "s_sudahnikah" => "Surat Keterangan Sudah Menikah",
    );

    return $jenis_surat[$key];
}

function getRomawi($bulan)
{
    switch ($bulan) {
        case 1:
            return "I";
            break;
        case 2:
            return "II";
            break;
        case 3:
            return "III";
            break;
        case 4:
            return "IV";
            break;
        case 5:
            return "V";
            break;
        case 6:
            return "VI";
            break;
        case 7:
            return "VII";
            break;
        case 8:
            return "VIII";
            break;
        case 9:
            return "IX";
            break;
        case 10:
            return "X";
            break;
        case 11:
            return "XI";
            break;
        case 12:
            return "XII";
            break;
    }
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
