<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class KategoriOpd extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('katopds', function (Blueprint $table) {
            $table->increments('id_katopd');
            $table->string('name');
            $table->timestamps();
        });

        Schema::table('kerjasama_dns', function($table){
            $table->foreign('id_katopd')
            ->references('id_katopd')
            ->on('katopds')
            ->onUpdate('cascade')
            ->onDelete('cascade');
        });

        Schema::table('kerjasama_lns', function($table){
            $table->foreign('id_katopd')
            ->references('id_katopd')
            ->on('katopds')
            ->onUpdate('cascade')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('katopds');
    }
}
