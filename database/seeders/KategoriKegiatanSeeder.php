<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\KategoriKegiatan;

class KategoriKegiatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //INSERT INTO `kegiatan` (`id_kegiatan`, `nama_kegiatan`, `kategori_kegiatan`, `isi_kegiatan`, `foto_kegiatan`, `status_kegiatan`, `tgl_mulai_kegiatan`, `tgl_selesai_kegiatan`, `created_at`, `updated_at`) VALUES (NULL, 'Kegiatan Gotong Royong', '1', 'Pada hari minggu ku turut ayah ke kota', NULL, '0', '2022-06-08 13:04:16', '2022-06-08 13:04:16', NULL, NULL)
        Kategorikegiatan::create([
            'id_kategori_kegiatan' => NULL,
            'kategori_kegiatan' => 'Kebersihan',
            'created_at' => '2022-07-10 08:25:56',
            'updated_at' => '2022-07-10 08:25:56'
        ]);
        Kategorikegiatan::create([
            'id_kategori_kegiatan' => NULL,
            'kategori_kegiatan' => 'Kesehatan',
            'created_at' => '2022-07-10 08:25:56',
            'updated_at' => '2022-07-10 08:25:56'
        ]);
        Kategorikegiatan::create([
            'id_kategori_kegiatan' => NULL,
            'kategori_kegiatan' => 'Urgent',
            'created_at' => '2022-07-10 08:25:56',
            'updated_at' => '2022-07-10 08:25:56'
        ]);
        Kategorikegiatan::create([
            'id_kategori_kegiatan' => NULL,
            'kategori_kegiatan' => 'Sosial',
            'created_at' => '2022-07-10 08:25:56',
            'updated_at' => '2022-07-10 08:25:56'
        ]);
        Kategorikegiatan::create([
            'id_kategori_kegiatan' => NULL,
            'kategori_kegiatan' => 'Ramah tamah',
            'created_at' => '2022-07-10 08:25:56',
            'updated_at' => '2022-07-10 08:25:56'
        ]);
    }
}
