<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class KategoriJeniskerjasamaDn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('katjeniskdns', function (Blueprint $table) {
            $table->increments('id_katjeniskdn');
            $table->integer('id_katkdn')->unsigned();
            $table->string('name');
            $table->timestamps();
        });

        Schema::table('kerjasama_dns', function($table){
            $table->foreign('id_katjeniskdn')
            ->references('id_katjeniskdn')
            ->on('katjeniskdns')
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
        Schema::dropIfExists('katjeniskdns');
    }
}
