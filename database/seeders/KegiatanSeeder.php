<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KegiatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //INSERT INTO `kegiatan` (`id_kegiatan`, `nama_kegiatan`, `kategori_kegiatan`, `isi_kegiatan`, `foto_kegiatan`, `status_kegiatan`, `tgl_mulai_kegiatan`, `tgl_selesai_kegiatan`, `created_at`, `updated_at`) VALUES (NULL, 'Kegiatan Gotong Royong', '1', 'Pada hari minggu ku turut ayah ke kota', NULL, '0', '2022-06-08 13:04:16', '2022-06-08 13:04:16', NULL, NULL)
        DB::table('kegiatan')->insert(
            [
                [
                    'nama_kegiatan' => 'Kegiatan Gotong Royong',
                    'kategori_kegiatan' => 1,
                    'id_penanggung_jawab' => 1,
                    'penanggung_jawab' => 'RW',
                    'isi_kegiatan' => 'Pada hari minggu ku turut ayah ke kota',
                    'foto_kegiatan' => 'no-image.png',
                    'status_kegiatan' => 0,
                    'tgl_mulai_kegiatan' => '2022-06-08 13:04:16',
                    'tgl_selesai_kegiatan' => '2022-06-08 13:04:16',
                ],
                [
                    'nama_kegiatan' => 'Kegiatan Gotong Royong 2',
                    'kategori_kegiatan' => 1,
                    'id_penanggung_jawab' => 1,
                    'penanggung_jawab' => 'RT',
                    'isi_kegiatan' => ' Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus accusamus voluptates architecto, doloremque velit facere reiciendis sint earum error vel iste molestiae odit, doloribus saepe alias nostrum corrupti ut repellendus.
                Rerum maiores dolorum sapiente, consequuntur aliquam beatae repellendus sit nemo eius delectus labore qui id sint voluptas reprehenderit maxime ea quae eveniet repellat mollitia quibusdam laboriosam nulla, porro dolor? Similique.',
                    'foto_kegiatan' => 'no-image.png',
                    'status_kegiatan' => 0,
                    'tgl_mulai_kegiatan' => '2022-05-01 13:04:16',
                    'tgl_selesai_kegiatan' => '2022-05-02 13:04:16',
                ],
                [
                    'nama_kegiatan' => 'Kegiatan Gotong Royong 3',
                    'kategori_kegiatan' => 1,
                    'id_penanggung_jawab' => 1,
                    'penanggung_jawab' => 'RT',
                    'isi_kegiatan' => 'tak kenal maka tak saya',
                    'foto_kegiatan' => 'no-image.png',
                    'status_kegiatan' => 0,
                    'tgl_mulai_kegiatan' => '2022-06-09 13:04:16',
                    'tgl_selesai_kegiatan' => '2022-06-09 13:04:16',
                ]
            ]
        );
    }
}
