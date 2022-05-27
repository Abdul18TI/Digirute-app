<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PengumumanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('pengumuman')->insert(
            [
                'id_pengumuman' => '1',
                'kategori_pengumuman' => '1',
                'judul_pengumuman' => 'rt1',
                'isi_pengumuman' => Hash::make('asdasd'),
                'foto_pengumuman' => '01',
                'status_pengumuman' => 'Ahmad Sahidi',
                'tgl_terbit' => '2022-05-19 13:36:34',
                'created_at	' => '2022-05-19 13:36:34',
                'updated_at	' => null
            ],
            [
                'id_pengumuman' => '1',
                'kategori_pengumuman' => '1',
                'judul_pengumuman' => 'rt1',
                'isi_pengumuman' => Hash::make('asdasd'),
                'foto_pengumuman' => '01',
                'status_pengumuman' => 'Ahmad Sahidi',
                'tgl_terbit' => '2022-05-19 13:36:34',
                'created_at	' => '2022-05-19 13:36:34',
                'updated_at	' => null
            ],
        );
    }
}
