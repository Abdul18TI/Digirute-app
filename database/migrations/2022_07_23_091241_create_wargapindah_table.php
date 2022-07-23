<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWargapindahTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('warga_pindah', function (Blueprint $table) {
            $table->id();
            $table->foreignId('warga')->constrained('wargas', 'id_warga')->onUpdate('cascade')
            ->onDelete('cascade');
            $table->String('dokumen_pindah');
            $table->date('tanggal_pindah');
            $table->text('alamat_pindah');
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
        Schema::dropIfExists('wargapindah');
    }
}
