<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGaleriLppdGambarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('galeri_lppd_gambars', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_galeri_lppd')->unsigned();
            $table->string('gambar');
            $table->timestamps();
        });

        Schema::table('galeri_lppd_gambars', function (Blueprint $table) {
            $table->foreign('id_galeri_lppd')
                ->references('id')->on('galeri_lppds')
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
        Schema::table('galeri_lppd_gambars', function (Blueprint $table) {
            $table->dropForeign(['id_galeri_lppd']);
        });

        Schema::dropIfExists('galeri_lppd_gambars');
    }
}
