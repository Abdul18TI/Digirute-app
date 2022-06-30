<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AgamaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('agama')->insert([
            ['id_agama' => 1, 'agama' => 'Islam'],
            ['id_agama' => 2, 'agama' => 'Kristen'],
            ['id_agama' => 3, 'agama' => 'Hindu'],
            ['id_agama' => 4, 'agama' => 'Budha'],
            ['id_agama' => 5, 'agama' => 'Katolik'],
            ['id_agama' => 6, 'agama' => 'Konghucu'],
        ]);
    }
}
