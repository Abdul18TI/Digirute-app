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
                    'akta_kawin' => NULL,
                    'akta_cerai' => NULL,
                    'tgl_cerai' => NULL,
                    'akta_kelahiran' => NULL,
                    'kelainan' => NULL,
                    'email_warga' => 'andrahafizhsb03@gmail.com',
                    'no_hp_warga' => '082276853372',
                    'rt' => '1',
                    'rw' => '1',
                    'status_warga' => '0',
                    'created_at' => NULL,
                    'updated_at' => NULL,
                    'deleted_at' => NULL
                ],
                [
                    'id_warga' => '2',
                    'nik' => '234234',
                    'no_kk' => '908324',
                    'username' => 'tony_wijaya',
                    'password' => Hash::make('asdasd'),
                    'nama_kepala_keluarga' => 'Dedi',
                    'nokk_kepala_keluarga' => '098765',
                    'status_hubungan_dalam_keluarga' => '1',
                    'alamat' => 'Jl. Sukaramai',
                    'kelurahan' => '1',
                    'kecamatan' => '1',
                    'kabupaten' => '1',
                    'provinsi' => '1',
                    'nama_dusun' => '1',
                    'kode_pos' => '28784',
                    'nama_lengkap' => 'Tony Wijaya',
                    'tempat_lahir' => 'Duri',
                    'tgl_lahir' => '2000-09-26 00:00:00',
                    'jenis_kelamin' => '1',
                    'agama' => '4',
                    'golongan_darah' => '12',
                    'pendidikan' => '5',
                    'pekerjaan' => '3',
                    'status_perkawinan' => 'belum_kawin',
                    'nomor_passport' => NULL,
                    'tgl_akhir_passport' => NULL,
                    'nomor_kitaskitap' => NULL,
                    'nik_ayah' => '456456',
                    'nama_ayah' => 'dedi',
                    'nik_ibu' => '86748',
                    'nama_ibu' => 'mawar',
                    'tgl_keluar_kk' => NULL,
                    'foto_warga' => 'no-image.png',
                    'tgl_perkawinan' => NULL,
                    'akta_kawin' => NULL,
                    'akta_cerai' => NULL,
                    'tgl_cerai' => NULL,
                    'akta_kelahiran' => NULL,
                    'kelainan' => NULL,
                    'email_warga' => 'tonywijaya@gmail.com',
                    'no_hp_warga' => '08227564521',
                    'rt' => '1',
                    'rw' => '1',
                    'status_warga' => '0',
                    'created_at' => NULL,
                    'updated_at' => NULL,
                    'deleted_at' => NULL
                ],
                [
                    'id_warga' => '3',
                    'nik' => '987987',
                    'no_kk' => '0927482',
                    'username' => 'rahmadtriadi',
                    'password' => Hash::make('asdasd'),
                    'nama_kepala_keluarga' => 'Budianto',
                    'nokk_kepala_keluarga' => '098098',
                    'status_hubungan_dalam_keluarga' => '1',
                    'alamat' => 'Jl. Harapan Raya',
                    'kelurahan' => '1',
                    'kecamatan' => '1',
                    'kabupaten' => '1',
                    'provinsi' => '1',
                    'nama_dusun' => '1',
                    'kode_pos' => '28111',
                    'nama_lengkap' => 'Rahmad Triad',
                    'tempat_lahir' => 'Labuhan Batu Utara',
                    'tgl_lahir' => '2001-01-26 00:00:00',
                    'jenis_kelamin' => '1',
                    'agama' => '1',
                    'golongan_darah' => '2',
                    'pendidikan' => '5',
                    'pekerjaan' => '3',
                    'status_perkawinan' => 'belum_kawin',
                    'nomor_passport' => NULL,
                    'tgl_akhir_passport' => NULL,
                    'nomor_kitaskitap' => NULL,
                    'nik_ayah' => '098098',
                    'nama_ayah' => 'Budianto',
                    'nik_ibu' => '76459',
                    'nama_ibu' => 'Iriani',
                    'tgl_keluar_kk' => NULL,
                    'foto_warga' => 'no-image.png',
                    'tgl_perkawinan' => NULL,
                    'akta_kawin' => NULL,
                    'akta_cerai' => NULL,
                    'tgl_cerai' => NULL,
                    'akta_kelahiran' => NULL,
                    'kelainan' => NULL,
                    'email_warga' => 'rahmadtriadi@gmail.com',
                    'no_hp_warga' => '085358899182',
                    'rt' => '2',
                    'rw' => '1',
                    'status_warga' => '0',
                    'created_at' => NULL,
                    'updated_at' => NULL,
                    'deleted_at' => NULL
                ]
                // [
                //     'id_warga' => NULL,
                //     'nik' => '082082',
                //     'no_kk' => '091091',
                //     'username' => 'abdul_arif',
                //     'password' => '$2y$10$hWLIMzNqwPvGmEcXciTco.0knBRwpWHTWNMwU7vkECPv1YaDf5r1e',
                //     'nama_kepala_keluarga' => 'Ibra',
                //     'nokk_kepala_keluarga' => '12345678',
                //     'status_hubungan_dalam_keluarga' => '1',
                //     'alamat' => 'jl. PBSI',
                //     'kelurahan' => '1',
                //     'kecamatan' => '1',
                //     'kabupaten' => '1',
                //     'provinsi' => '1',
                //     'nama_dusun' => '1',
                //     'kode_pos' => '098098',
                //     'nama_lengkap' => 'Abdul Arif',
                //     'tempat_lahir' => 'Medan',
                //     'tgl_lahir' => '2000-06-29 16:47:18',
                //     'jenis_kelamin' => '1',
                //     'agama' => '1',
                //     'golongan_darah' => '1',
                //     'pendidikan' => '1',
                //     'pekerjaan' => '1',
                //     'status_perkawinan' => 'belum_kawin',
                //     'status_akta_cerai' => '1',
                //     'nomor_passport' => NULL,
                //     'tgl_akhir_passport' => NULL,
                //     'nomor_kitaskitap' => NULL,
                //     'nik_ayah' => '456456',
                //     'nama_ayah' => 'ibra',
                //     'nik_ibu' => '75848',
                //     'nama_ibu' => 'laura',
                //     'tgl_keluar_kk' => NULL,
                //     'foto_warga' => 'no-image.png',
                //     'tgl_perkawinan' => NULL,
                //     'akta_kawin' => NULL,
                //     'akta_cerai' => NULL,
                //     'tgl_cerai' => NULL,
                //     'akta_kelahiran' => NULL,
                //     'kelainan' => NULL,
                //     'email_warga' => 'andrahafizhsb03@gmail.com',
                //     'no_hp_warga' => '082276853372',
                //     'rt' => '1',
                //     'rw' => '1',
                //     'status_warga' => '0',
                //     'created_at' => NULL,
                //     'updated_at' => NULL,
                //     'deleted_at' => NULL
                // ], [
                //     'id_warga' => NULL,
                //     'nik' => '456456',
                //     'no_kk' => '091091',
                //     'username' => 'raihan',
                //     'password' => '$2y$10$hWLIMzNqwPvGmEcXciTco.0knBRwpWHTWNMwU7vkECPv1YaDf5r1e',
                //     'nama_kepala_keluarga' => 'Ibra',
                //     'nokk_kepala_keluarga' => '12345678',
                //     'status_hubungan_dalam_keluarga' => '1',
                //     'alamat' => 'jl. PBSI',
                //     'kelurahan' => '1',
                //     'kecamatan' => '1',
                //     'kabupaten' => '1',
                //     'provinsi' => '1',
                //     'nama_dusun' => '1',
                //     'kode_pos' => '098098',
                //     'nama_lengkap' => 'Raihan',
                //     'tempat_lahir' => 'Medan',
                //     'tgl_lahir' => '2000-06-29 16:47:18',
                //     'jenis_kelamin' => '1',
                //     'agama' => '1',
                //     'golongan_darah' => '1',
                //     'pendidikan' => '1',
                //     'pekerjaan' => '1',
                //     'status_perkawinan' => 'belum_kawin',
                //     'nomor_passport' => NULL,
                //     'tgl_akhir_passport' => NULL,
                //     'nomor_kitaskitap' => NULL,
                //     'nik_ayah' => '456456',
                //     'nama_ayah' => 'ibra',
                //     'nik_ibu' => '75848',
                //     'nama_ibu' => 'laura',
                //     'tgl_keluar_kk' => NULL,
                //     'foto_warga' => 'no-image.png',
                //     'tgl_perkawinan' => NULL,
                //     'akta_kawin' => NULL,
                //     'akta_cerai' => NULL,
                //     'tgl_cerai' => NULL,
                //     'akta_kelahiran' => NULL,
                //     'kelainan' => NULL,
                //     'email_warga' => 'andrahafizhsb03@gmail.com',
                //     'no_hp_warga' => '082276853372',
                //     'rt' => '1',
                //     'rw' => '1',
                //     'status_warga' => '0',
                //     'created_at' => NULL,
                //     'updated_at' => NULL,
                //     'deleted_at' => NULL
                // ]
            ]
        );
    }
}
