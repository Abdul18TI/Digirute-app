<?php

namespace Database\Seeders;

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

        DB::table('wargas')->insert([
            'nik' => '121212',
            'no_kk' => '120012',
            'username' => 'andra_hafiz',
            'password' => Hash::make('asdasd'),
            'alamat' => 'Jl. PBSI Comp. UMA No. 13',
            'kelurahan' => '1',
            'kecamatan' => '1',
            'kabupaten' => '1',
            'provinsi' => '1',
            'kode_pos' => '13045',
            'nama_lengkap' => 'Andra Hotmartua Al Hafiz',
            'tempat_lahir' => 'Medan',
            'tgl_lahir' => '954694800',
            'jenis_kelamin' => '1',
            'agama' => '1',
            'golongan_darah' => '1',
            'pendidikan' => '1',
            'pekerjaan' => '1',
            'status_hubungan' => '1',
            'status_perkawinan' => 'belum_kawin',
            'nomor_passport' => NULL,
            'tanggal_akhir_passport' => NULL,
            'nomor_kitaskitap' => NULL,
            'nik_ayah' => '098',
            'nama_ayah' => 'Jon',
            'nik_ibu' => '890',
            'nama_ibu' => 'Laura',
            'tgl_keluar_kk' => '954694800',
            'foto_warga' => NULL,
            'akta_kawin' => NULL,
            'akta_cerai' => NULL,
            'tanggal_cerai' => NULL,
            'kelainan' => NULL,
            'email_warga' => 'andrahafizhsb03@gmail.com',
            'no_hp_warga' => '082276853389',
            'rt' => '1',
            'rw' => '1'
        ]);
    }
}
