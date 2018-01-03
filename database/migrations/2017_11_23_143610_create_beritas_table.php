<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBeritasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('beritas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_katberita')->unsigned();
            $table->text('judul');
            $table->text('isi');
            $table->date('tanggal');
            $table->string('gambar');
            $table->integer('id_user')->unsigned();
            $table->string('slug');
            $table->integer('dibaca')->default(0);
            $table->timestamps();
        });

        Schema::table('beritas', function (Blueprint $table) {
            $table->foreign('id_katberita')
                ->references('id')->on('katberitas')
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
        Schema::table('beritas', function (Blueprint $table) {
            $table->dropForeign(['id_katberita']);
            $table->dropForeign(['id_user']);
        });

        Schema::dropIfExists('beritas');
    }
}
