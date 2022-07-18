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
        DB::table('kategori_pengumuman')->insert([
            'nama_kategori_pengumuman' => 'Umum'
        ]);
        DB::table('kategori_pengaduan')->insert([
            ['nama_kategori_pengaduan' => 'Kenyamanan'],
            ['nama_kategori_pengaduan' => 'Kesalahan Data'],
            ['nama_kategori_pengaduan' => 'Sistem'],
        ]);
    }
}
