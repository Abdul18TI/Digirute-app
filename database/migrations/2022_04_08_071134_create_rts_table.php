<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRtsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rts', function (Blueprint $table) {
            $table->id('id_rt');
            $table->foreignId('id_rw');
            $table->string('no_rt');
            $table->string('ketua_rt');
            $table->dateTime('tgl_awal_jabatan_rt');
            $table->dateTime('tgl_akhir_jabatan_rt');
            $table->integer('status_rt');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rts');
    }
}
