<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengaduansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengaduans', function (Blueprint $table) {
            $table->id('id_pengaduan');
            $table->string('judul_pengaduan');
            $table->foreignId('nik');
            $table->foreignId('kategori_pengaduan');
            $table->text('deskripsi_pengaduan');
            $table->string('bukti_pengaduan')->nullable();
            $table->text('tanggapan_pengaduan')->nullable();
            $table->foreignId('id_rt');
            $table->integer('status_pengaduan')->default(0)->comment('0 : proses ; 1 : ditolak; 2: diterima');
            $table->boolean('ditampilkan')->default(true)->comment('true : di tampilkan ; false : tidak ditampilkan');
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
        Schema::dropIfExists('pengaduans');
    }
}
