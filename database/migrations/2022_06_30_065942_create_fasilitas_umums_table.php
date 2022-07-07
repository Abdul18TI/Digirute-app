<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFasilitasUmumsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fasilitas_umums', function (Blueprint $table) {
            $table->id('id_fasilitas_umum');
            $table->foreignId('kategori_fasilitas_umum');
            $table->string('fasilitas_umum');
            $table->text('deskripsi_fasilitas');
            $table->text('koordinant_fasilitas')->nullable();
            $table->string('foto_fasilitas');
            $table->integer('status_fasilitas');
            $table->string('alamat_fasilitas');
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
        Schema::dropIfExists('fasilitas_umums');
    }
}
