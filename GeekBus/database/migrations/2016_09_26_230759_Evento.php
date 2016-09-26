<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Evento extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Evento', function (Blueprint $table) {
            $table->integer('idCamion')->unsigned();
            $table->foreign('idCamion')->references('idCamion')->on('Camion')->onDelete('cascade');
            $table->datetime('fechahora');
            $table->integer('idTipoEvento')->unsigned();
            $table->foreign('idTipoEvento')->references('idTipoEvento')->on('TipoEvento')->onDelete('cascade');
            $table->integer('valor');
            $table->integer('conductor')->unsigned();
            $table->foreign('conductor')->references('idConductor')->on('Conductor')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('Evento');
    }
}
