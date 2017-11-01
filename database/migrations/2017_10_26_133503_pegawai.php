<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Pegawai extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pegawais', function (Blueprint $table) {
            $table->increments('id_pegawai');
            $table->integer('id_katbagian')->unsigned();;
            $table->string('name', 100);
            $table->integer('id_katjabatan')->unsigned();;
            $table->string('jabatan', 150);
            $table->string('golongan');
            $table->date('mulaijabat');
            $table->text('pendidikan');
            $table->text('riwayatkerja');
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
        Schema::dropIfExists('pegawais');
    }
}
