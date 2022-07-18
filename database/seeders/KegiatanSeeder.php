<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kegiatan;

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
        Kegiatan::create([
            'id_kegiatan' => NULL,
            'nama_kegiatan' => 'Kegiatan galang dana untuk Masjid Baitul Muqtamar',
            'kategori_kegiatan' => '1',
            'id_penanggung_jawab' => '1',
            'penanggung_jawab' => 'RW',
            'isi_kegiatan' => '
             Assalamualaikum wr.wb.
            
             
            
            Segala puji bagi Allah SWT yang telah mencurahkan rahmat dan hidayah-Nya. Yang telah memberikan kita rizqi dari arah yang tidak disangka-sangka. Semoga kita diberi kesehatan sehingga bisa beraktivias seperti biasanya.
            
            Seperti yang sudah dibahas pada bulan lalu di Umban sari yang telah disepakati oleh semua warga, bahwa pada bulan depan akan dilaksanankan pembangunan penambahan area Masjid Baitul Muqtamar, maka kami selaku panitia ingin memohon bantuan kepada Bapak/Ibu sekalian atau semua masyarakat yang ingin menyumbangnya dengan ikhlas.
            
            Adapun rincian yang dibutuhkan dalam pembangunan masjid ialah Rp.9.000.000; dengan perkiraan sebagai berikut:
            
            1. Biaya pembelian semen 20 sak Rp. 1,500,000;
            
            2. Biaya pembelian batu bata 2000 pcs Rp. 5,500,000
            
            3. Biaya tukang Rp. 2,000,000
            
            Demikian surat permohonan ini kami buat.
            
            Atas waktu dan perhatiannya kami ucapkan terima kasih dan semoga amal ibadah kita diterima Allah SWT, aamiin.
            
             
            
            Wassalamualaikum Wr. Wb
            
             
            
            Desa umban sari, 18 Juli 2022
            
            ',
            'foto_kegiatan' => 'gambar-kegiatan/aFzCF7i4VRsu6ozYRNMsKaDqjoMvOKpqSQYiQdLI.jpg',
            'status_kegiatan' => '1',
            'tgl_mulai_kegiatan' => '2022-07-18 08:41:00',
            'tgl_selesai_kegiatan' => '2022-07-17 08:42:00',
            'created_at' => '2022-07-17 01:41:56',
            'updated_at' => '2022-07-17 01:42:44'
        ]);


        Kegiatan::create([
            'id_kegiatan' => NULL,
            'nama_kegiatan' => 'Galang dana untuk membantu Sdri. Iis Setia',
            'kategori_kegiatan' => '2',
            'id_penanggung_jawab' => '1',
            'penanggung_jawab' => 'RW',
            'isi_kegiatan' => '
            Assallamu\'alaikum Wr. Wb.
            Puji syukur kehadirat Allah SWT yang mana telah melimpahkan nikmat kesehatan sehingga kita semua masih bisa melakukan aktivitas sehari-hari dengan lancar, dan semoga apa yang kita lakukan selalu dalam lindungan Allah SWT Amin...
            
            
            Dengan ini kami memohon bantuan dan keikhlasan dari Bapak/Ibu untuk memberikan bantuan dana, sehubungan dengan musibah yang menimpa saudara kita yakni Sdri. Iis Setia (RT 02 RW 01 ) yang saat ini sedang di rawat di Rumah Sakit.
            
            
            Seperti yang kita tahu, bahwa keadaan ekonomi dari keluarga beliau merupakan kurang mampu, oleh karena itu dengan ini kami memohon bantuan dana kepada Bapak/Ibu/Sdr/Sdri guna meringankan beban dari saudara kita.
            
            
            Demikian surat permohonan ini kami buat, atas perhatian dan partisipasi dari para dermawan/dermawati kami ucapkan terima kasih.
            
            
            Wassallamu\'alaikum Wr. Wb.
            
            
            Rumbai, 28 Juli 2022
            Mengetahui, Ketua RW. 01 Suryadiatmo
            Ketua RT. 03 Said
            
            ',
            'foto_kegiatan' => 'gambar-kegiatan/JXR3UD2gjg3QaVHM1HTEiEJKn7k4ZpSPiJCzMCnM.jpg',
            'status_kegiatan' => '3',
            'tgl_mulai_kegiatan' => '2022-07-28 08:45:00',
            'tgl_selesai_kegiatan' => '2022-07-28 08:45:00',
            'created_at' => '2022-07-17 01:46:17',
            'updated_at' => '2022-07-17 01:46:17'
        ]);


        Kegiatan::create([
            'id_kegiatan' => NULL,
            'nama_kegiatan' => 'Kegiatan gotong royong RW 01 untuk aksi peduli lingkungan',
            'kategori_kegiatan' => '4',
            'id_penanggung_jawab' => '1',
            'penanggung_jawab' => 'RW',
            'isi_kegiatan' => '
            Assallamu\'alaikum Wr. Wb.
            Puji syukur kehadirat Allah SWT yang mana telah melimpahkan nikmat kesehatan sehingga kita semua masih bisa melakukan aktivitas sehari-hari dengan lancar, dan semoga apa yang kita lakukan selalu dalam lindungan Allah SWT Amin...
            
            
            Dengan ini kami memohon bantuan dan keikhlasan dari Bapak/Ibu untuk mengikuti kegiatan gotong royong untuk mewujudkan lingkungan sehat dan bersih di sekitar kita
            
            
            Wassallamu\'alaikum Wr. Wb. 
            
            ',
            'foto_kegiatan' => 'gambar-kegiatan/RuOFmim3TljuhXiWA97LG5sDlb4nPgzbslQ1cjCv.jpg',
            'status_kegiatan' => '1',
            'tgl_mulai_kegiatan' => '2022-07-23 08:50:00',
            'tgl_selesai_kegiatan' => '2022-07-23 08:51:00',
            'created_at' => '2022-07-17 01:51:07',
            'updated_at' => '2022-07-17 01:51:07'
        ]);


        Kegiatan::create([
            'id_kegiatan' => NULL,
            'nama_kegiatan' => 'Kegiatan Pemeriksaan Kesehatan Gratis',
            'kategori_kegiatan' => '5',
            'id_penanggung_jawab' => '1',
            'penanggung_jawab' => 'RT',
            'isi_kegiatan' => '
             Assallamu\'alaikum Wr. Wb.
            Puji syukur kehadirat Allah SWT yang mana telah melimpahkan nikmat kesehatan sehingga kita semua masih bisa melakukan aktivitas sehari-hari dengan lancar, dan semoga apa yang kita lakukan selalu dalam lindungan Allah SWT Amin... 
            
            Dalam kegiatan ini kader PKK dan organisasi lainnya juga difasilitasi. Pelayanan yang diberikan berupa pemeriksaan tensi dan konsultasi medis lainnya.
            
            Bagi warga yang kondisi kesehatannya kurang prima, maka oleh petugas puskesmas diberikan obat agar kondisinya kembali sehat dan bisa beraktivitas seperti biasa.
            
            Lurah Langkai, Sri Wanti mengharapkan agar kegiatan layanan ini dapat berlanjut di kemudian hari.
            
            “Kami upayakan program ini bisa berlanjut agar kondisi kesehatan aparatur kelurahan hingga tingkat RT dan RW tetap prima, sehingga tugas kepemerintahan bisa dijalankan dengan sebagaimana mestinya,” sebutnya.
            
            Ia menambahkan kegiatan ini juga sangat didukung oleh pihak puskesmas, bahkan mereka sangat terbantu, karena mereka tinggal melakukan pemeriksaan, sedangkan pihak kelurahan yang bertugas melakukan koordinasi dengan para RT dan RW 
            
             Wassallamu\'alaikum Wr. Wb. ',
            'foto_kegiatan' => 'gambar-kegiatan/wZRl4WEiezpQVt0XCCdEpkTGylaqw4EXc5ZQognr.jpg',
            'status_kegiatan' => '2',
            'tgl_mulai_kegiatan' => '2022-07-30 08:53:00',
            'tgl_selesai_kegiatan' => '2022-08-06 08:53:00',
            'created_at' => '2022-07-17 01:54:27',
            'updated_at' => '2022-07-17 01:54:27'
        ]);


        Kegiatan::create([
            'id_kegiatan' => NULL,
            'nama_kegiatan' => '17 Agustus RW 01',
            'kategori_kegiatan' => '5',
            'id_penanggung_jawab' => '1',
            'penanggung_jawab' => 'RT',
            'isi_kegiatan' => '
             Assallamu\'alaikum Wr. Wb.
            Puji syukur kehadirat Allah SWT yang mana telah melimpahkan nikmat kesehatan sehingga kita semua masih bisa melakukan aktivitas sehari-hari dengan lancar, dan semoga apa yang kita lakukan selalu dalam lindungan Allah SWT Amin... 
            
             Ayo bersama-sama! Kita melaksanakan upacara bendera di lapangan untuk memperingati hari kemerdekaan 17 Agustus! 
            
             Wassallamu\'alaikum Wr. Wb. ',
            'foto_kegiatan' => 'gambar-kegiatan/l9cfCq12AL5xF1JTU0027Zh4V6PH8QXqzNVSbna4.png',
            'status_kegiatan' => '1',
            'tgl_mulai_kegiatan' => '2022-08-17 08:55:00',
            'tgl_selesai_kegiatan' => '2022-08-17 08:55:00',
            'created_at' => '2022-07-17 01:56:29',
            'updated_at' => '2022-07-17 01:56:29'
        ]);
    }
}
