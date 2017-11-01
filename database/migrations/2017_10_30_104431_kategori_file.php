<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class KategoriFile extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('katfiles', function (Blueprint $table) {
            $table->increments('id_katfile');
            $table->string('name');
            $table->timestamps();
        });

        schema::table('publikasis', function ($table)
        {
            $table->foreign('id_katfile')
            ->references('id_katfile')
            ->on('katfiles')
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
        Schema::dropIfExists('katfiles');
    }
}
