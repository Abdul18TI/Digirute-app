<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call([
            RtSeeder::class,
            RwSeeder::class,
            PekerjaanSeeder::class,
            PendidikanSeeder::class,
            DaerahSeeder::class,
            GolonganDarahSeeder::class,
            UtilSeeder::class,
            KategoriKegiatanSeeder::class,
            KategoriFasilitasUmumSeeder::class,
            KegiatanSeeder::class,
            FasilitasSeeder::class,
            PengumumanSeeder::class,
            AgamaSeeder::class,
            WargaSeeder::class,
        ]);
    }
}
