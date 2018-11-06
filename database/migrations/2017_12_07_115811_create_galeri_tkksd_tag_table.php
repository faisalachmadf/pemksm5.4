<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGaleriTkksdTagTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('galeri_tkksd_tag', function (Blueprint $table) {
            $table->integer('id_galeri_tkksd')->unsigned();
            $table->integer('id_tag')->unsigned();
            $table->timestamps();
        });

        Schema::table('galeri_tkksd_tag', function (Blueprint $table) {
            $table->foreign('id_galeri_tkksd')
                ->references('id')->on('galeri_tkksds')
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
        Schema::table('galeri_tkksd_tag', function (Blueprint $table) {
            $table->dropForeign(['id_galeri_tkksd']);
            $table->dropForeign(['id_tag']);
        });

        Schema::dropIfExists('galeri_tkksd_tag');
    }
}

