<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKegiatanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kegiatan', function (Blueprint $table) {
            $table->id('id_kegiatan');
            $table->string('nama_kegiatan');
            $table->foreignId('kategori_kegiatan');
            $table->foreignId('id_penanggung_jawab');
            $table->string('penanggung_jawab');
            $table->text('isi_kegiatan');
            $table->string('foto_kegiatan')->default('no-image.jpg');
            $table->integer('status_kegiatan');
            $table->timestamp('tgl_mulai_kegiatan')->nullable();
            $table->timestamp('tgl_selesai_kegiatan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('_kegiatan');
    }
}
