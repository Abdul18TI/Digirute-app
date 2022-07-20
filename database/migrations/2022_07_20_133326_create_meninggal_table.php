<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMeninggalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('warga_meninggal', function (Blueprint $table) {
            $table->id();
            $table->foreignId('warga')->unique()->constrained('wargas', 'id_warga')->onUpdate('cascade')
            ->onDelete('cascade');
            $table->string('sebab_kematian');
            $table->string('tempat_kematian');
            $table->date('tgl_kematian');
            $table->string('nik_pelapor');
            $table->string('hubungan_jenazah');
            $table->string('nama_pelapor');
            $table->string('tempat_lahir_pelapor');
            // $table->foreignId('no_surat')->unique()->constrained('surat', 'id_surat');
            $table->foreignId('no_surat')->nullable();
            $table->boolean('cetak_surat')->default(0);
            $table->date('tgl_lahir_pelapor');
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
        Schema::dropIfExists('meninggal');
    }
}
