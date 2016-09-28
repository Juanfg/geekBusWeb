<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Ubicaciones extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Ubicaciones', function (Blueprint $table) {
            $table->increments('idUbicacion');
            $table->integer('idCamion')->unsigned();
            $table->foreign('idCamion')->references('idCamion')->on('Camiones')->onDelete('cascade');
            $table->datetime('fechahora');
            $table->double('lat');
            $table->double('long');
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
        Schema::drop('Ubicaciones');
    }
}
