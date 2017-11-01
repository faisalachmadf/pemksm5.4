<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class KategoriJabatan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('katjabatans', function (Blueprint $table) {
            $table->increments('id_katjabatan');
            $table->string('name');
            $table->timestamps();
        });

         schema::table('pegawais', function($table){
            $table->foreign('id_katjabatan')
            ->references('id_katjabatan')
            ->on('katjabatans')
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
        Schema::dropIfExists('katjabatans');
    }
}
