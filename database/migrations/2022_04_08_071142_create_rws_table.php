<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRwsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rws', function (Blueprint $table) {
            $table->id('id_rw');
            $table->string('no_rw');
            $table->string('ketua_rw');
            $table->dateTime('tgl_awal_jabatan_rw');
            $table->dateTime('tgl_akhir_jabatan_rw');
            $table->integer('status_rw');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rws');
    }
}
