<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AjukanBerkas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('berkas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nomor',20);
            $table->integer('pemohon_id')->unsigned();
            $table->string('lat');
            $table->string('long');
            $table->integer('kelurahan_id')->unsigned();
            $table->string('luas');
            $table->integer('instansi_id')->unsigned();
            $table->string('peruntukan');
            $table->string('status')->nullable();
            $table->text('keterangan')->nullable();
            $table->timestamps();

            $table->foreign('pemohon_id')->references('id')->on('pemohon')->onUpdate('cascade')->onDelete('restrict');
       
            $table->foreign('kelurahan_id')->references('id')->on('kelurahan')->onUpdate('cascade')->onDelete('restrict');
       
            $table->foreign('instansi_id')->references('id')->on('instansi')->onUpdate('cascade')->onDelete('restrict');
       
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('berkas');
    }
}
