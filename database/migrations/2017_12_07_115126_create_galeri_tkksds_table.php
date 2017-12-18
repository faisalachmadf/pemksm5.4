<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGaleriTkksdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('galeri_tkksds', function (Blueprint $table) {
            $table->increments('id');
            $table->string('judul');
            $table->string('gambar');
            $table->string('slug');
            $table->integer('id_user')->unsigned();
            $table->timestamps();
        });

        Schema::table('galeri_tkksds', function (Blueprint $table) {
            $table->foreign('id_user')
                ->references('id')->on('users')
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
        Schema::table('galeri_tkksds', function (Blueprint $table) {
            $table->dropForeign(['id_user']);
        });

        Schema::dropIfExists('galeri_tkksds');
    }
}
