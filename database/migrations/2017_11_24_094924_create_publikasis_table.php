<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePublikasisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('publikasis', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_katfile')->unsigned();
            $table->string('judul');
            $table->date('tanggal');
            $table->string('file');
            $table->string('slug');
            $table->integer('id_user')->unsigned();
            $table->integer('diunduh')->default(0);
            $table->timestamps();
        });

        Schema::table('publikasis', function (Blueprint $table) {
            $table->foreign('id_katfile')
                ->references('id')->on('katfiles')
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
        Schema::table('publikasis', function (Blueprint $table) {
            $table->dropForeign(['id_katfile']);
            $table->dropForeign(['id_user']);
        });

        Schema::dropIfExists('publikasis');
    }
}
