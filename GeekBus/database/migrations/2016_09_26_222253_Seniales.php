<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Seniales extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Seniales', function(Blueprint $table) {
            $table->integer('idCamion')->unsigned();
            $table->foreign('idCamion')->references('idCamion')->on('Camiones')->onDelete('cascade');
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
        Schema::drop('Seniales');
    }
}
