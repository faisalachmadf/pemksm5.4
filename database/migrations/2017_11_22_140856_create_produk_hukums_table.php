<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProdukHukumsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produk_hukums', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_kathukum')->unsigned();
            $table->text('nama');
            $table->string('file');
            $table->integer('diunduh')->default(0);
            $table->string('slug');
            $table->timestamps();
        });

        Schema::table('produk_hukums', function (Blueprint $table) {
            $table->foreign('id_kathukum')
                ->references('id')->on('kathukums')
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
        Schema::table('produk_hukums', function (Blueprint $table) {
            $table->dropForeign(['id_kathukum']);
        });

        Schema::dropIfExists('produk_hukums');
    }
}
