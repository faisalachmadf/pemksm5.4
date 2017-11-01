<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class KategoriUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('katusers', function (Blueprint $table) {
            $table->increments('id_katuser');
            $table->string('name');
            $table->timestamps();

        });

        schema::table('users', function($table){
            $table->foreign('id_katuser')
            ->references('id_katuser')
            ->on('katusers')
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
        Schema::dropIfExists('katusers');
    }
}
