<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWargaMiskinTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('warga_miskin', function (Blueprint $table) {
            $table->id();
            $table->foreignId('warga')->constrained('wargas', 'id_warga')->onUpdate('cascade')
            ->onDelete('cascade');
            $table->String('bukti');
            $table->text('deskripsi');
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
        Schema::dropIfExists('warga_miskin');
    }
}
