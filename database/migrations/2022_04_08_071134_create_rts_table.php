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
            $table->string('username')->unique()->nullable();
            $table->string('password')->nullable();
            $table->string('no_rt');
            $table->foreignId('id_warga');
            $table->string('ketua_rt');
            $table->timestamp('tgl_awal_jabatan_rt')->nullable();
            $table->timestamp('tgl_akhir_jabatan_rt')->nullable();
            $table->integer('status_rt');
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
        Schema::dropIfExists('rts');
    }
}
