<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class KategoriBagian extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('katbagians', function (Blueprint $table) {
            $table->increments('id_katbagian');
            $table->string('name');
            $table->timestamps();
        });

        schema::table('pegawais', function($table){
            $table->foreign('id_katbagian')
            ->references('id_katbagian')
            ->on('katbagians')
            ->onUpdate('cascade')
            ->onDelete('cascade');
        });

         schema::table('kelembagaans', function($table){
            $table->foreign('id_katbagian')
            ->references('id_katbagian')
            ->on('katbagians')
            ->onUpdate('cascade')
            ->onDelete('cascade');
        });

         schema::table('agendas', function($table){
            $table->foreign('id_katbagian')
            ->references('id_katbagian')
            ->on('katbagians')
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
        Schema::dropIfExists('=katbagians');
    }
}
