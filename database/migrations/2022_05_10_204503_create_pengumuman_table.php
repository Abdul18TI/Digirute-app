<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengumumanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengumuman', function (Blueprint $table) {
            $table->id('id_pengumuman');
            $table->foreignId('kategori_pengumuman');
            $table->foreignId('id_penanggung_jawab');
            $table->string('penanggung_jawab');
            $table->string('judul_pengumuman');
            $table->text('isi_pengumuman');
            $table->string('foto_pengumuman')->nullable();
            $table->integer('status_pengumuman');
            $table->timestamp('tgl_terbit')->nullable();
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
        Schema::dropIfExists('pengumuman');
    }
}
