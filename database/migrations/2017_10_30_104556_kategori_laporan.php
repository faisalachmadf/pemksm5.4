<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class KategoriLaporan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('katlaporans', function (Blueprint $table) {
            $table->increments('id_katlaporan');
            $table->string('name');
            $table->timestamps();
        });

        schema::table('laporans', function($table){
            $table->foreign('id_katlaporan')
            ->references('id_katlaporan')
            ->on('katlaporans')
            ->onUpdate('cascade')
            ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('katlaporans');
    }
}
