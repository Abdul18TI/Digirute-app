<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class RtSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('rts')->insert(
            [
                'id_rt' => '1',
                'id_rw' => '1',
                'username' => 'rt1',
                'password' => Hash::make('asdasd'),
                'no_rt' => '01',
                'id_warga' => '1',
                'ketua_rt' => 'Ahmad Sahidi',
                'tgl_awal_jabatan_rt' => '2022-05-19 13:36:34',
                'tgl_akhir_jabatan_rt' => '2027-05-19 13:36:34',
                'status_rt' => '1'
            ],
            [
                'id_rt' => '2',
                'id_rw' => '1',
                'username' => 'rt2',
                'password' => Hash::make('asdasd'),
                'no_rt' => '02',
                'id_warga' => '2',
                'ketua_rt' => 'Abdul Aziz',
                'tgl_awal_jabatan_rt' => '2022-05-19 13:36:34',
                'tgl_akhir_jabatan_rt' => '2027-05-19 13:36:34',
                'status_rt' => '1'
            ],
            [
                'id_rt' => '3',
                'id_rw' => '2',
                'username' => 'rt3',
                'password' => Hash::make('asdasd'),
                'no_rt' => '01',
                'ketua_rt' => 'Abdul Rozi',
                'tgl_awal_jabatan_rt' => '2022-05-19 13:36:34',
                'tgl_akhir_jabatan_rt' => '2027-05-19 13:36:34',
                'status_rt' => '1'
            ]
        );
    }
}
