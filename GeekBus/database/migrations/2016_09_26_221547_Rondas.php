<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Rondas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Rondas', function (Blueprint $table) {
            $table->increments('idRonda');
            $table->integer('idConductor')->unsigned();
            $table->foreign('idConductor')->references('idConductor')->on('Conductores')->onDelete('cascade');
            $table->integer('idCamion')->unsigned();
            $table->foreign('idCamion')->references('idCamion')->on('Camiones')->onDelete('cascade');
            $table->dateTime('entrada');
            $table->dateTime('salida')->nullable();
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
        Schema::drop('Rondas');
    }
}
