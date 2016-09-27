<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Ronda extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Ronda', function (Blueprint $table) {
            $table->integer('conductor')->unsigned();
            $table->foreign('conductor')->references('idCamion')->on('Camion')->onDelete('cascade');
            $table->dateTime('entrada');
            $table->dateTime('salida');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('Ronda');
    }
}
