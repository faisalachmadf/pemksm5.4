<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddIdUserToProdukHukumsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('produk_hukums', function (Blueprint $table) {
            $table->integer('id_user')->unsigned()->nullable();
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
        Schema::table('produk_hukums', function (Blueprint $table) {
            $table->dropForeign(['id_user']);
            $table->dropColumn(['id_user']);
        });
    }
}
