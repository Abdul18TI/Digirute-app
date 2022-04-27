<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PendidikanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        DB::table('pendidikans')->insert([
            ['id_pendidikan' => 1, 'nama_pendidikan' => 'Tidak / Belum Sekolah'],
            ['id_pendidikan' => 2, 'nama_pendidikan' => 'Tidak Tamat SD / Sederajat'],
            ['id_pendidikan' => 3, 'nama_pendidikan' => 'Tamat SD / Sederajat'],
            ['id_pendidikan' => 4, 'nama_pendidikan' => 'SLTP / Sederajat'],
            ['id_pendidikan' => 5, 'nama_pendidikan' => 'SLTA / Sederajat'],
            ['id_pendidikan' => 6, 'nama_pendidikan' => 'Diploma I / II'],
            ['id_pendidikan' => 7, 'nama_pendidikan' => 'Akademi / Diploma III / S. Muda'],
            ['id_pendidikan' => 8, 'nama_pendidikan' => 'Diploma IV / Strata I'],
            ['id_pendidikan' => 9, 'nama_pendidikan' => 'Strata II'],
            ['id_pendidikan' => 10, 'nama_pendidikan' => 'Strata III']
        ]);
    }
}
