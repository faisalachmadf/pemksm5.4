<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKelembagaansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kelembagaans', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_katbagian')->unsigned();
            $table->string('judul');
            $table->date('tanggal');
            $table->text('isi');
            $table->string('gambar');
            $table->timestamps();
        });

        Schema::table('kelembagaans', function (Blueprint $table) {
            $table->foreign('id_katbagian')
                ->references('id')->on('katbagians')
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
        Schema::table('kelembagaans', function (Blueprint $table) {
            $table->dropForeign(['id_katbagian']);
        });

        Schema::dropIfExists('kelembagaans');
    }
}
