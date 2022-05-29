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
            $table->text('isi_kegiatan');
            $table->string('foto_kegiatan')->nullable();
            $table->integer('status_kegiatan');
            $table->bigInteger('tgl_upload_kegiatan');
            $table->bigInteger('tgl_mulai_kegiatan');
            $table->bigInteger('tgl_selesai_kegiatan');
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
