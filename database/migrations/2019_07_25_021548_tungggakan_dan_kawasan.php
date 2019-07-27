<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TungggakanDanKawasan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('berkas', function (Blueprint $table) {       
            $table->string('tunggakan')->nullable()->after('keterangan')->default('tidak');
            $table->string('kawasan')->nullable()->default('non pertanian');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('berkas', function (Blueprint $table) {
            $table->dropColumn('kawasan');
            $table->dropColumn('tunggakan');
        });
    }
}
