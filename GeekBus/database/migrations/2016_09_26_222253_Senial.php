<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Senial extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Senial', function(Blueprint $table) {
            $table->integer('idCamion')->unsigned();
            $table->foreign('idCamion')->references('idCamion')->on('Camion')->onDelete('cascade');
            $table->datetime('fechahora');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('Senial');
    }
}
