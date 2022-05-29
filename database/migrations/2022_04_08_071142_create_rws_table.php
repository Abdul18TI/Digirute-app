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
            $table->string('username')->unique()->nullable();
            $table->string('password')->nullable();
            $table->string('no_rw');
            $table->foreignId('id_warga');
            $table->string('ketua_rw');
            $table->timestamp('tgl_awal_jabatan_rw')->nullable();
            $table->timestamp('tgl_akhir_jabatan_rw')->nullable();
            $table->integer('status_rw');
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
        Schema::dropIfExists('rws');
    }
}
