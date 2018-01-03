<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMitralnsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mitralns', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_katmitraln')->unsigned();
            $table->text('judul');
            $table->string('gambar');
            $table->text('isi');
            $table->integer('id_user')->unsigned();
            $table->string('slug');
            $table->timestamps();
        });

        Schema::table('mitralns', function (Blueprint $table) {
            $table->foreign('id_katmitraln')
                ->references('id')->on('katmitralns')
                ->onUpdate('cascade')
                ->onDelete('cascade');
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
        Schema::table('mitralns', function (Blueprint $table) {
            $table->dropForeign(['id_katmitraln']);
            $table->dropForeign(['id_user']);
        });

        Schema::dropIfExists('mitralns');
    }
}
