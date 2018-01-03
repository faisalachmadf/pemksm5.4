<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePegawaisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pegawais', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_katbagian')->unsigned();
            $table->integer('id_katgolongan')->unsigned();
            $table->integer('id_katjabatan')->unsigned();
            $table->string('nip');
            $table->text('nama');
            $table->text('jabatan');
            $table->date('mulaijabat');
            $table->text('pendidikan');
            $table->text('riwayatkerja');
            $table->string('gambar');
            $table->timestamps();
        });

        Schema::table('pegawais', function (Blueprint $table) {
            $table->foreign('id_katbagian')
                ->references('id')->on('katbagians')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreign('id_katgolongan')
                ->references('id')->on('katgolongans')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreign('id_katjabatan')
                ->references('id')->on('katjabatans')
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
        Schema::table('pegawais', function (Blueprint $table) {
            $table->dropForeign(['id_katbagian']);
            $table->dropForeign(['id_katgolongan']);
            $table->dropForeign(['id_katjabatan']);
        });

        Schema::dropIfExists('pegawais');
    }
}
