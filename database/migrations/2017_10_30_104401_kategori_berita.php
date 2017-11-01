<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class KategoriBerita extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('katberitas', function (Blueprint $table) {
            $table->increments('id_katberita');
            $table->string('name');
            $table->timestamps();
        });

        schema::table('beritas', function($table){
            $table->foreign('id_katberita')
            ->references('id_katberita')
            ->on('katberitas')
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
        Schema::dropIfExists('katberitas');
    }
}
