<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GolonganDarahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        DB::table('golongan_darahs')->insert([
            ['id_goldar' => 1, 'golongan_darah' => 'A'],
            ['id_goldar' => 2, 'golongan_darah' => 'B'],
            ['id_goldar' => 3, 'golongan_darah' => 'AB'],
            ['id_goldar' => 4, 'golongan_darah' => 'O'],
            ['id_goldar' => 5, 'golongan_darah' => 'A+'],
            ['id_goldar' => 6, 'golongan_darah' => 'A-'],
            ['id_goldar' => 7, 'golongan_darah' => 'B+'],
            ['id_goldar' => 8, 'golongan_darah' => 'B-'],
            ['id_goldar' => 9, 'golongan_darah' => 'AB+'],
            ['id_goldar' => 10, 'golongan_darah' => 'AB-'],
            ['id_goldar' => 11, 'golongan_darah' => 'O+'],
            ['id_goldar' => 12, 'golongan_darah' => 'O-'],
            ['id_goldar' => 0, 'golongan_darah' => 'Tidak Tahu']
        ]);
        //
    }
}
