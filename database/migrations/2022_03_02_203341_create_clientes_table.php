<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->id();
            $table->string('nif')->unique();
            $table->string('nombre');
            $table->string('direccion')->nullable();
            $table->string('poblacion')->nullable();
            $table->string('provincia')->nullable();
            $table->string('cod_postal')->nullable();
            $table->string('email')->nullable();
            $table->string('telefono')->nullable();
            $table->string('avatar')->nullable();
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
        Schema::dropIfExists('clientes');
    }
}
