<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPetugasIdOnBerkas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('berkas', function (Blueprint $table) {       
            $table->UnsignedInteger('petugas_id')->nullable()->after('kawasan');
            $table->foreign('petugas_id')->references('id')->on('petugas')->onUpdate('cascade')->onDelete('set null');
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
            $table->dropColumn('petugas_id');
        });
    }
}
