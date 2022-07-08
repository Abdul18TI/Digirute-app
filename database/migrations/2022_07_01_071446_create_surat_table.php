<?php

use App\Models\Warga;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuratTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surat', function (Blueprint $table) {
            $table->id('id_surat');
            $table->foreignId('pengaju')->nullable()->constrained('wargas', 'id_warga');
            $table->foreignId('rt')->constrained('rts', 'id_rt');
            $table->foreignId('rw')->nullable()->constrained('rws', 'id_rw');
            $table->string('nomor_surat')->nullable();
            $table->string('jenis_surat');
            $table->smallInteger('status_tandatangan')->comment('0 = RT ; 1 = RT RW; 2 = RW ?');
            $table->string('status_surat', 25);
            $table->json('propertie_surat');
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
        Schema::dropIfExists('surat');
    }
}
