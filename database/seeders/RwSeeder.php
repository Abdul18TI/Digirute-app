<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class RwSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('rws')->insert(
            [
                'id_rw' => '1',
                'username' => 'rw1',
                'password' => Hash::make('asdasd'),
                'no_rw' => '01',
                'ketua_rw' => 'Pak RW 01',
                'tgl_awal_jabatan_rw' => '2022-05-19 13:36:34',
                'tgl_akhir_jabatan_rw' => '2027-05-19 13:36:34',
                'status_rw' => '1'

            ],
            [
                'id_rw' => '2',
                'username' => 'rw2',
                'password' => Hash::make('asdasd'),
                'no_rw' => '02',
                'ketua_rw' => 'Pak RW 02',
                'tgl_awal_jabatan_rw' => '2022-05-19 13:36:34',
                'tgl_akhir_jabatan_rw' => '2027-05-19 13:36:34',
                'status_rw' => '1'
            ]
        );
    }
}
