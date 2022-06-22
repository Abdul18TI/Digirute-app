<?php

namespace Database\Seeders;

use App\Models\Warga;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class WargaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('wargas')->insert(
            [
                [
                'id_warga' => '1',
                'nik' => '123123',
                'no_kk' => '321321',
                'username' => 'andra_hafiz',
                'password' => Hash::make('asdasd'),
                'nama_kepala_keluarga' => 'Ibra',
                'nokk_kepala_keluarga' => '12345678',
                'status_hubungan_dalam_keluarga' => '1',
                'alamat' => 'jl. PBSI',
                'kelurahan' => '1',
                'kecamatan' => '1',
                'kabupaten' => '1',
                'provinsi' => '1',
                'nama_dusun' => '1',
                'kode_pos' => '098098',
                'nama_lengkap' => 'Andra Hafiz HSB',
                'tempat_lahir' => 'Medan',
                'tgl_lahir' => '2000-06-29 16:47:18',
                'jenis_kelamin' => '1',
                'agama' => '1',
                'golongan_darah' => '1',
                'pendidikan' => '1',
                'pekerjaan' => '1',
                'status_hubungan' => '1',
                'status_perkawinan' => 'belum_kawin',
                'nomor_passport' => NULL,
                'tgl_akhir_passport' => NULL,
                'nomor_kitaskitap' => NULL,
                'nik_ayah' => '456456',
                'nama_ayah' => 'ibra',
                'nik_ibu' => '75848',
                'nama_ibu' => 'laura',
                'tgl_keluar_kk' => NULL,
                'foto_warga' => 'no-image.png',
                'tgl_perkawinan' => NULL,
                'status_akta_kawin' => '0',
                'akta_kawin' => NULL,
                'status_akta_cerai' => '0',
                'akta_cerai' => NULL,
                'tgl_cerai' => NULL,
                'status_akta_kelahiran' => '0',
                'akta_kelahiran' => NULL,
                'status_kelainan' => '0',
                'kelainan' => NULL,
                'email_warga' => 'andrahafizhsb03@gmail.com',
                'no_hp_warga' => '082276853372',
                'rt' => '1',
                'rw' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL
                ],[
                    'id_warga' => NULL,
                    'nik' => '082082',
                    'no_kk' => '091091',
                    'username' => 'abdul_arif',
                    'password' => '$2y$10$hWLIMzNqwPvGmEcXciTco.0knBRwpWHTWNMwU7vkECPv1YaDf5r1e',
                    'nama_kepala_keluarga' => 'Ibra',
                    'nokk_kepala_keluarga' => '12345678',
                    'status_hubungan_dalam_keluarga' => '1',
                    'alamat' => 'jl. PBSI',
                    'kelurahan' => '1',
                    'kecamatan' => '1',
                    'kabupaten' => '1',
                    'provinsi' => '1',
                    'nama_dusun' => '1',
                    'kode_pos' => '098098',
                    'nama_lengkap' => 'Abdul Arif',
                    'tempat_lahir' => 'Medan',
                    'tgl_lahir' => '2000-06-29 16:47:18',
                    'jenis_kelamin' => '1',
                    'agama' => '1',
                    'golongan_darah' => '1',
                    'pendidikan' => '1',
                    'pekerjaan' => '1',
                    'status_hubungan' => '1',
                    'status_perkawinan' => 'belum_kawin',
                    'nomor_passport' => NULL,
                    'tgl_akhir_passport' => NULL,
                    'nomor_kitaskitap' => NULL,
                    'nik_ayah' => '456456',
                    'nama_ayah' => 'ibra',
                    'nik_ibu' => '75848',
                    'nama_ibu' => 'laura',
                    'tgl_keluar_kk' => NULL,
                    'foto_warga' => 'no-image.png',
                    'tgl_perkawinan' => NULL,
                    'status_akta_kawin' => '0',
                    'akta_kawin' => NULL,
                    'status_akta_cerai' => '0',
                    'akta_cerai' => NULL,
                    'tgl_cerai' => NULL,
                    'status_akta_kelahiran' => '0',
                    'akta_kelahiran' => NULL,
                    'status_kelainan' => '0',
                    'kelainan' => NULL,
                    'email_warga' => 'andrahafizhsb03@gmail.com',
                    'no_hp_warga' => '082276853372',
                    'rt' => '1',
                    'rw' => '1',
                    'created_at' => NULL,
                    'updated_at' => NULL,
                    'deleted_at' => NULL
                ]
            ]
        );
    }
}
