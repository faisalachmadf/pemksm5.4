<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class KerjasamaDalamNegeri extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kerjasama_dns', function (Blueprint $table) {
            $table->increments('id_kerjasamadn');
            $table->string('tahun');
            $table->string('nomor');
            $table->integer('id_katjeniskdn')->unsigned();
            $table->string('judul', 250);
            $table->text('pihak');
            $table->text('summary');
            $table->date('tanggal_awal');
            $table->date('tanggal_akhir');
            $table->integer('id_katopd')->unsigned();
            $table->string('ket');
            $table->string('gambar');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kerjasama_dns');
    }
}
