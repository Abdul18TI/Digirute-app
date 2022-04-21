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
            $table->string('username')->unique()->nullable();
            $table->string('password')->nullable();
            $table->text('alamat');
            $table->foreignId('kelurahan');
            $table->foreignId('kecamatan');
            $table->foreignId('kabupaten');
            $table->foreignId('provinsi');
            $table->string('kode_pos');
            $table->string('nama_lengkap');
            $table->string('tempat_lahir');
            $table->bigInteger('tgl_lahir');
            $table->integer('jenis_kelamin');
            $table->foreignId('agama');
            $table->foreignId('pekerjaan');
            $table->enum('golongan_darah', ['A', 'B', 'AB', 'O']);
            $table->enum('status_perkawinan', ['belum_kawin', 'kawin', 'cerai_hidup', 'cerai']);
            $table->string('nomor_passport')->unique()->nullable();
            $table->string('nomor_kitaskitap')->unique()->nullable();
            $table->string('nama_ayah');
            $table->string('nama_ibu');
            $table->bigInteger('tgl_keluar_kk');
            $table->string('foto_warga')->nullable();
            // $table->dateTime('tanggal_tambah');
            $table->string('email_warga')->nullable();
            $table->string('no_hp_warga')->nullable();
            $table->foreignId('rt');
            $table->foreignId('rw');
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
