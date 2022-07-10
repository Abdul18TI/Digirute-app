<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusHubunganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('status_hubungans')->insert([
            ['id_status_hubungan ' => 1, 'status_hubungan' => 'Kepala Keluarga'],
            ['id_status_hubungan ' => 2, 'status_hubungan' => 'Suami'],
            ['id_status_hubungan ' => 3, 'status_hubungan' => 'Istri'],
            ['id_status_hubungan ' => 4, 'status_hubungan' => 'Anak'],
            ['id_status_hubungan ' => 5, 'status_hubungan' => 'Menantu'],
            ['id_status_hubungan ' => 6, 'status_hubungan' => 'Cucu'],
            ['id_status_hubungan ' => 7, 'status_hubungan' => 'Orang Tua'],
            ['id_status_hubungan ' => 8, 'status_hubungan' => 'Mertua'],
            ['id_status_hubungan ' => 9, 'status_hubungan' => 'Famili Lain'],
            ['id_status_hubungan ' => 10, 'status_hubungan' => 'Pembantu'],
        ]);
    }
}
