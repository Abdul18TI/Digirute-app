<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Fasilitas_umum;

class FasilitasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Fasilitas_umum::create([
            'id_fasilitas_umum' => NULL,
            'kategori_fasilitas_umum' => '5',
            'fasilitas_umum' => 'Politeknik Caltex Riau',
            'deskripsi_fasilitas' => 'Salah satu kampus terbaik di riau dan merupakan politeknik swasta terbaik di indonesia',
            'koordinant_fasilitas' =>  '<div class=\"mapouter\"><div class=\"gmap_canvas\"><iframe width=\"600\" height=\"500\" id=\"gmap_canvas\" src=\"https://maps.google.com/maps?q=Politeknik%20Caltex%20Riau&t=&z=13&ie=UTF8&iwloc=&output=embed\" frameborder=\"0\" scrolling=\"no\" marginheight=\"0\" marginwidth=\"0\"></iframe><a href=\"https://www.whatismyip-address.com/divi-discount/\">divi discount</a><br><style>.mapouter{position:relative;text-align:right;height:500px;width:600px;}</style><a href=\"https://www.embedgooglemap.net\">google make your own map</a><style>.gmap_canvas {overflow:hidden;background:none!important;height:500px;width:600px;}</style></div></div>',
            'foto_fasilitas' => 'gambar-fasilitas/S1gnB2tXxdajiHAkAMyWzsF2yvgTdJhPPybMHvtj.jpg',
            'status_fasilitas' => '1',
            'alamat_fasilitas' => 'Jl. Umban Sari ( Patin ) No. 1, Rumbai, Umban Sari, Kec. Rumbai, Kota Pekanbaru, Riau 28265',
            'created_at' => '2022-07-17 04:20:19',
            'updated_at' => '2022-07-17 04:20:19'
        ]);
    }
}
