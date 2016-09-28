<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ParadaCamiones extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ParadaCamiones', function (Blueprint $table) {
            $table->increments('idParadaCamion');
            $table->integer('idRuta')->unsigned();
            $table->foreign('idRuta')->references('idRuta')->on('Rutas')->onDelete('cascade');
            $table->integer('idParada')->unsigned();
            $table->foreign('idParada')->references('idParada')->on('Paradas')->onDelete('cascade');
            $table->integer('numParada');
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
        Schema::drop('ParadaCamiones');
    }
}
