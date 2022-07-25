<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWargasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wargas', function (Blueprint $table) {
            $table->id('id_warga'); ////
            $table->string('nik'); ////
            $table->string('no_kk'); ////
            $table->string('username')->unique()->nullable();
            $table->string('password')->nullable();
            $table->string('nama_kepala_keluarga'); ////
            $table->string('nokk_kepala_keluarga'); ////
            $table->integer('status_hubungan_dalam_keluarga'); //
            $table->text('alamat'); ////
            $table->foreignId('kelurahan'); ////
            $table->foreignId('kecamatan'); ////
            $table->foreignId('kabupaten'); ////
            $table->foreignId('provinsi'); ////
            $table->string('nama_dusun'); ////
            $table->string('kode_pos'); ////
            $table->string('nama_lengkap'); ////
            $table->string('tempat_lahir'); ////
            $table->date('tgl_lahir')->nullable(); ////
            $table->integer('jenis_kelamin')->comment('1 => Laki-laki 2 => Perempuan'); ////
            $table->foreignId('agama'); ////
            $table->foreignId('golongan_darah'); ////
            $table->foreignId('pendidikan'); ////
            $table->foreignId('pekerjaan'); ////
            $table->enum('status_perkawinan', ['belum_kawin', 'kawin', 'cerai_hidup', 'cerai']); ////
            $table->integer('jenis_warga')->comment('1 => Tetap 0 => Tidak tetap');; ////
            $table->string('nomor_passport')->nullable(); ////
            $table->date('tgl_akhir_passport')->nullable(); ////
            $table->string('nomor_kitaskitap')->unique()->nullable(); ////
            // $table->string('status_akta_cerai')->nullable(); ////
            // $table->string('status_akta_kawin')->nullable(); ////
            // $table->string('status_akta_kelahiran')->nullable(); ////
            $table->string('nik_ayah'); ////
            $table->string('nama_ayah'); ////
            $table->string('nik_ibu'); ////
            $table->string('nama_ibu'); ////
            $table->date('tgl_keluar_kk')->nullable(); ////
            $table->string('foto_warga')->default('no-image.png'); ////
            $table->date('tgl_perkawinan')->nullable(); ////
            $table->string('akta_kawin')->nullable(); ////
            $table->string('akta_cerai')->nullable(); ////
            $table->date('tgl_cerai')->nullable(); ////
            $table->string('akta_kelahiran')->nullable(); ////
            $table->string('kelainan')->nullable(); ////
            // $table->string('status_kelainan')->default('0'); ////
            $table->string('email_warga')->nullable(); //
            $table->string('no_hp_warga')->nullable(); //
            $table->foreignId('rt')->nullable(); //
            $table->foreignId('rw')->nullable(); //
            $table->integer('status_warga')->default(0)->comment('0=>Hidup; 1=>Mati; 3=>Pindah'); //
            $table->integer('active')->default(1)->comment('1=>Aktif; 0=>Non Aktif'); //
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('wargas');
    }
}
