<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class KategoriJeniskerjasamaLn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('katjenisklns', function (Blueprint $table) {
            $table->increments('id_katjeniskln');
            $table->integer('id_katkln')->unsigned();
            $table->string('name');
            $table->timestamps();
        });

        Schema::table('kerjasama_lns', function($table){
            $table->foreign('id_katjeniskln')
            ->references('id_katjeniskln')
            ->on('katjenisklns')
            ->onUpdate('dascade')
            ->onDelete('dascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('katjenisklns');
    }
}
