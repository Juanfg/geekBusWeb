<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ParadaCamion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ParadaCamion', function (Blueprint $table) {
            $table->integer('idRuta')->unsigned();
            $table->foreign('idRuta')->references('idRuta')->on('Ruta')->onDelete('cascade');
            $table->integer('idParada')->unsigned();
            $table->foreign('idParada')->references('idParada')->on('Parada')->onDelete('cascade');
            $table->integer('numParada');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('ParadaCamion');
    }
}