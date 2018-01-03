<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAgendasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agendas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_katbagian')->unsigned();
            $table->text('judul');
            $table->date('tanggal');
            $table->string('jam');
            $table->text('lokasi');
            $table->string('slug');
            $table->integer('id_user')->unsigned();
            $table->timestamps();
        });

        Schema::table('agendas', function (Blueprint $table) {
            $table->foreign('id_katbagian')
                ->references('id')->on('katbagians')
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
        Schema::table('agendas', function (Blueprint $table) {
            $table->dropForeign(['id_katbagian']);
            $table->dropForeign(['id_user']);
        });

        Schema::dropIfExists('agendas');
    }
}
