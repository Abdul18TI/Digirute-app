<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIuransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('iurans', function (Blueprint $table) {
            $table->id('id_iuran');
            $table->foreignId('pj_iuran');
            $table->foreignId('jenis_iuran');
            $table->string('judul_iuran');
            $table->integer('target_iuran')->nullable();
            $table->integer('jumlah_iuran')->nullable();
            $table->timestamp('tgl_mulai_iuran')->nullable();
            $table->timestamp('tgl_akhir_iuran')->nullable();
            $table->text('deskripsi_iuran');
            $table->integer('status_iuran');
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
        Schema::dropIfExists('iurans');
    }
}
