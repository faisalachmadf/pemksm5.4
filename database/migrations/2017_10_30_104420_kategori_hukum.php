<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class KategoriHukum extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kathukums', function (Blueprint $table) {
            $table->increments('id_kathukum');
            $table->string('name');
            $table->timestamps();
        });

        schema::table('produkhukums', function($table){
            $table->foreign('id_kathukum')
            ->references('id_kathukum')
            ->on('kathukums')
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
        Schema::dropIfExists('kathukums');
    }
}
