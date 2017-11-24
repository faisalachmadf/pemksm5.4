<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGaleriLppdTagTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('galeri_lppd_tag', function (Blueprint $table) {
            $table->integer('id_galeri_lppd')->unsigned();
            $table->integer('id_tag')->unsigned();
            $table->timestamps();
        });

        Schema::table('galeri_lppd_tag', function (Blueprint $table) {
            $table->foreign('id_galeri_lppd')
                ->references('id')->on('galeri_lppds')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreign('id_tag')
                ->references('id')->on('tags')
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
        Schema::table('galeri_lppd_tag', function (Blueprint $table) {
            $table->dropForeign(['id_galeri_lppd']);
            $table->dropForeign(['id_tag']);
        });

        Schema::dropIfExists('galeri_lppd_tag');
    }
}
