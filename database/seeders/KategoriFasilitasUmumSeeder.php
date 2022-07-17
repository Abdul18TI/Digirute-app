<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kategori_fasilitas_umum;

class KategoriFasilitasUmumSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Kategori_fasilitas_umum::create([
            'id_kategori_fasilitas' => NULL,
            'kategori_fasilitas' => 'Kos kosan',
            'created_at' => '2022-07-05 18:14:45',
            'updated_at' => '2022-07-07 16:33:30'
        ]);

        Kategori_fasilitas_umum::create([
            'id_kategori_fasilitas' => NULL,
            'kategori_fasilitas' => 'Masjid',
            'created_at' => '2022-07-17 04:10:48',
            'updated_at' => '2022-07-17 04:10:48'
        ]);

        Kategori_fasilitas_umum::create([
            'id_kategori_fasilitas' => NULL,
            'kategori_fasilitas' => 'Kampus',
            'created_at' => '2022-07-17 04:10:55',
            'updated_at' => '2022-07-17 04:10:55'
        ]);

        Kategori_fasilitas_umum::create([
            'id_kategori_fasilitas' => NULL,
            'kategori_fasilitas' => 'Puskesmas',
            'created_at' => '2022-07-17 04:11:05',
            'updated_at' => '2022-07-17 04:11:05'
        ]);

        Kategori_fasilitas_umum::create([
            'id_kategori_fasilitas' => NULL,
            'kategori_fasilitas' => 'Apotik',
            'created_at' => '2022-07-17 04:11:12',
            'updated_at' => '2022-07-17 04:11:12'
        ]);

        Kategori_fasilitas_umum::create([
            'id_kategori_fasilitas' => NULL,
            'kategori_fasilitas' => 'Gereja',
            'created_at' => '2022-07-17 04:11:12',
            'updated_at' => '2022-07-17 04:11:12'
        ]);

        Kategori_fasilitas_umum::create([
            'id_kategori_fasilitas' => NULL,
            'kategori_fasilitas' => 'Vihara',
            'created_at' => '2022-07-17 04:11:12',
            'updated_at' => '2022-07-17 04:11:12'
        ]);

        Kategori_fasilitas_umum::create([
            'id_kategori_fasilitas' => NULL,
            'kategori_fasilitas' => 'Rumah makan',
            'created_at' => '2022-07-17 04:11:12',
            'updated_at' => '2022-07-17 04:11:12'
        ]);
    }
}
