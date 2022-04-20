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
            $table->id('id_warga');
            $table->string('nik')->unique();
            $table->string('no_kk');
            $table->string('username')->unique();
            $table->string('password');
            $table->text('alamat');
            $table->string('kode_pos');
            $table->string('nama_lengkap');
            $table->string('tempat_lahir');
            $table->string('tgl_lahir');
            $table->string('jenis_kelamin');
            $table->enum('golongan_darah', ['A', 'B', 'AB', 'O']);
            $table->enum('status_perkawinan', ['belum_kawin', 'kawin', 'cerai_hidup', 'cerai']);
            $table->string('nomor_passport')->unique();
            $table->string('nomor_kitaskitap')->unique();
            $table->string('nama_ayah');
            $table->string('nama_ibu');
            $table->integer('tgl_keluar_kk');
            $table->string('foto_warga');
            $table->dateTime('tanggal_tambah');
            $table->string('email_warga');
            $table->string('no_hp_warga');
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
