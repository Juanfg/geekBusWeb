<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Camion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Camion', function (Blueprint $table) {
            $table->increments('idCamion');
            $table->primary('idCamion');
            $table->integer('idRuta');
            $table->foreign('idRuta')->references('idRuta')->on('Ruta');
            $table->integer('unidad');
            $table->integer('asientos');
            $table->integer('capacidadMaxima');
            $table->integer('rpmMax');
            $table->integer('velMax');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('Camion');
    }
}
