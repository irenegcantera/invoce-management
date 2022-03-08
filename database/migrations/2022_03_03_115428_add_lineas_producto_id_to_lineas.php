<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddLineasProductoIdToLineas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('lineas', function (Blueprint $table) {
            $table->bigInteger('producto_id')->unsigned()->nullable();
            $table->foreign('producto_id')
                ->references('id')
                ->on('productos')
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
        Schema::table('lineas', function (Blueprint $table) {
            $table->dropForeign('lineas_producto_id');
        });
    }
}
