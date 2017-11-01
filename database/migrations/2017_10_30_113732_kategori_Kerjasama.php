<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class KategoriKerjasama extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    Schema::create('katkerjasamas', function (Blueprint $table) {
            $table->increments('id_katkerjasama');
            $table->string('name');
            $table->timestamps();
        });

        schema::table('katkdns', function($table){
            $table->foreign('id_katkerjasama')
            ->references('id_katkerjasama')
            ->on('katkerjasamas')
            ->onUpdate('cascade')
            ->onDelete('cascade');
        });

        schema::table('katklns', function($table){
            $table->foreign('id_katkerjasama')
            ->references('id_katkerjasama')
            ->on('katkerjasamas')
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
        Schema::dropIfExists('katkerjasamas');
    }
}
