<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Incidencias extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Incidencias', function (Blueprint $table) {
            $table->increments('idIncidencia');
            $table->integer('idEvento')->unsigned();
            $table->foreign('idEvento')->references('idEvento')->on('Eventos')->onDelete('cascade');
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
        Schema::drop('Incidencias');
    }
}
