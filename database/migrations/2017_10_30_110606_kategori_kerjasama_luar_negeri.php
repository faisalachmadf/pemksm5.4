<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class KategoriKerjasamaLn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('katklns', function (Blueprint $table) {
            $table->increments('id_katkln');
            $table->string('id_katkerjasama')->unsigned();
            $table->string('name');
            $table->timestamps();
        });

         schema::table('katjenisklns', function($table){
            $table->foreign('id_katkln')
            ->references('id_katkln')
            ->on('katklns')
            ->onUpdate('cascade')
            ->onDelete('cascade');
        });

         schema::table('mitra_lns', function($table){
            $table->foreign('id_katkln')
            ->references('id_katkln')
            ->on('katklns')
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
        Schema::dropIfExists('katklns');
    }
}
