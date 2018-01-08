<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKerjasamaDnsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kerjasama_dns', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_katdn')->unsigned();
            $table->integer('id_katjenisdn')->unsigned();
            $table->string('tahun');
            $table->text('nomor');
            $table->text('judul');
            $table->text('pihak');
            $table->text('summary');
            $table->date('tanggal_awal');
            $table->date('tanggal_akhir');
            $table->integer('id_katopd')->unsigned();
            $table->text('keterangan');
            $table->string('gambar');
            $table->text('slug');
            $table->integer('id_user')->unsigned();
            $table->timestamps();
        });

        Schema::table('kerjasama_dns', function (Blueprint $table) {
            $table->foreign('id_katdn')
                ->references('id')->on('katdns')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreign('id_katjenisdn')
                ->references('id')->on('katjenisdns')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreign('id_katopd')
                ->references('id')->on('katopds')
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
        Schema::table('kerjasama_dns', function (Blueprint $table) {
            $table->dropForeign(['id_katdn']);
            $table->dropForeign(['id_katjenisdn']);
            $table->dropForeign(['id_katopd']);
            $table->dropForeign(['id_user']);
        });

        Schema::dropIfExists('kerjasama_dns');
    }
}
