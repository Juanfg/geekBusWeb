<?php

use Illuminate\Database\Seeder;

class SeedRutas extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Rutas')->insert([
            'idRuta'=> 1,
            'nombre' => "Ruta 45",
            'descripcion' => "Ruta que pasa por Atlixcayotl",
        ]);
        DB::table('Rutas')->insert([
            'idRuta'=> 2,
            'nombre' => "Movi Lomas 2",
            'descripcion' => "Segunda ruta de Lomas",
        ]);
        DB::table('Rutas')->insert([
       	    'idRuta'=> 3,
            'nombre' => "Movi Lomas 1",
            'descripcion' => "Primera ruta de Lomas",
        ]);
        DB::table('Rutas')->insert([
            'idRuta'=> 4,
            'nombre' => "Ruta Europa",
            'descripcion' => "Ruta que pasa por Sonata",
        ]);
        DB::table('Rutas')->insert([
            'idRuta'=> 5,
            'nombre' => "Ruta Boulevard",
            'descripcion' => "Ruta que pasa por uni Inter",
        ]);
    }
}
