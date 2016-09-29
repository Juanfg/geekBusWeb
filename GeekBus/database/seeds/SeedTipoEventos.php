<?php

use Illuminate\Database\Seeder;

class SeedTipoEventos extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('TipoEventos')->insert([
            'idTipoEvento' => 1,
            'descripcion' => "Encendido",
        ]);
        DB::table('TipoEventos')->insert([
            'idTipoEvento' => 2,
            'descripcion' => "Apagado",
        ]);
        DB::table('TipoEventos')->insert([
            'idTipoEvento' => 3,
            'descripcion' => "Revoluciones por minuto",
        ]);
        DB::table('TipoEventos')->insert([
            'idTipoEvento' => 4,
            'descripcion' => "Cantidad de pasajeros",
        ]);
        DB::table('TipoEventos')->insert([
            'idTipoEvento' => 5,
            'descripcion' => "Temperatura del motor",
        ]);
        DB::table('TipoEventos')->insert([
            'idTipoEvento' => 6,
            'descripcion' => "Velocidad",
        ]);
        DB::table('TipoEventos')->insert([
            'idTipoEvento' => 7,
            'descripcion' => "Parada",
        ]);
    }
}