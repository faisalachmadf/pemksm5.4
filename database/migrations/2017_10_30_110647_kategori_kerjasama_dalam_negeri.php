<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class KategoriKerjasamaDn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('katkdns', function (Blueprint $table) {
            $table->increments('id_katkdn');
            $table->string('id_katkerjasama')->unsigned();
            $table->string('name');
            $table->timestamps();
        });

        schema::table('katjeniskdns', function($table){
            $table->foreign('id_katkdn')
            ->references('id_katkdn')
            ->on('katkdns')
            ->onUpdate('cascade')
            ->onDelete('cascade');
        });

         schema::table('mitra_dns', function($table){
            $table->foreign('id_katkdn')
            ->references('id_katkdn')
            ->on('katkdns')
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
        Schema::dropIfExists('katkdns');
    }
}
