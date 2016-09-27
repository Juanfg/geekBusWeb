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
            $table->integer('conductor')->unsigned();
            $table->foreign('conductor')->references('idCamion')->on('Camiones')->onDelete('cascade');
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
        Schema::drop('Rondas');
    }
}
