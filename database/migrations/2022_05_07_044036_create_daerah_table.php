<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDaerahTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_provinsi', function (Blueprint $table) {
            $table->id('id_prov');
            $table->string('nama');
        });
        Schema::create('tb_kabupaten', function (Blueprint $table) {
            $table->id('id_kab');
            $table->foreignId('id_prov');
            $table->string('nama');
            $table->integer('id_jenis');
        });
        Schema::create('tb_kecamatan', function (Blueprint $table) {
            $table->id('id_kec');
            $table->foreignId('id_kab');
            $table->string('nama');
        });
        Schema::create('tb_kelurahan', function (Blueprint $table) {
            $table->id('id_kel');
            $table->foreignId('id_kec');
            $table->string('nama');
            $table->integer('id_jenis');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_provinsi');
        Schema::dropIfExists('tb_kabupaten');
        Schema::dropIfExists('tb_kecamatan');
        Schema::dropIfExists('tb_kelurahan');
    }
}
