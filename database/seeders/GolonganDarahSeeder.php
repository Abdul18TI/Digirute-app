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
            ['id' => 1, 'golongan_darah' => 'A'],
            ['id' => 2, 'golongan_darah' => 'B'],
            ['id' => 3, 'golongan_darah' => 'AB'],
            ['id' => 4, 'golongan_darah' => 'O'],
            ['id' => 5, 'golongan_darah' => 'A+'],
            ['id' => 6, 'golongan_darah' => 'A-'],
            ['id' => 7, 'golongan_darah' => 'B+'],
            ['id' => 8, 'golongan_darah' => 'B-'],
            ['id' => 9, 'golongan_darah' => 'AB+'],
            ['id' => 10, 'golongan_darah' => 'AB-'],
            ['id' => 11, 'golongan_darah' => 'O+'],
            ['id' => 12, 'golongan_darah' => 'O-'],
            ['id' => 0, 'golongan_darah' => 'Tidak Tahu']
        ]);
        //
    }
}
