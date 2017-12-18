<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGaleriTkksdGambarsTable extends Migration
// galeri_tkksd_gambars_table
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('galeri_tkksd_gambars', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_galeri_tkksd')->unsigned();
            $table->string('gambar');
            $table->timestamps();
        });

        Schema::table('galeri_tkksd_gambars', function (Blueprint $table) {
            $table->foreign('id_galeri_tkksd')
                ->references('id')->on('galeri_tkksds')
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
        Schema::table('galeri_tkksd_gambars', function (Blueprint $table) {
            $table->dropForeign(['id_galeri_tkksd']);
        });

        Schema::dropIfExists('galeri_tkksd_gambars');
    }
}


