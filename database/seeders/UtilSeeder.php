<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UtilSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('jenis_iuran')->insert([
            'nama_jenis_iuran' => 'Kebersihan'
        ]);
        DB::table('kategori_kegiatan')->insert([
            'kategori_kegiatan' => 'Urgent'
        ]);
        DB::table('kategori_pengumuman')->insert([
            'nama_kategori_pengumuman' => 'Umum'
        ]);
    }
}