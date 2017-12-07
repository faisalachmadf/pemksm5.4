<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMitradnsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mitradns', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_katmitra')->unsigned();
            $table->string('judul');
            $table->string('gambar');
            $table->text('isi');
            $table->integer('id_user')->unsigned();
            $table->string('slug');
            $table->timestamps();
        });

        Schema::table('mitradns', function (Blueprint $table) {
            $table->foreign('id_katmitra')
                ->references('id')->on('katmitras')
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
        Schema::table('mitradns', function (Blueprint $table) {
            $table->dropForeign(['id_katmitra']);
            $table->dropForeign(['id_user']);
        });

        Schema::dropIfExists('mitradns');
    }
}
