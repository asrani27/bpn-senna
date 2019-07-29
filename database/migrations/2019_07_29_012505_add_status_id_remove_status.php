<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddStatusIdRemoveStatus extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('berkas', function (Blueprint $table) {
            $table->dropColumn('status');
            $table->UnsignedInteger('status_id')->nullable()->after('peruntukan');

            $table->foreign('status_id')->references('id')->on('status')->onUpdate('cascade')->onDelete('set null');
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
            $table->dropColumn('status_id');    
            $table->string('status');
        });
    }
}
