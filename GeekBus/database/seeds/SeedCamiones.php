<?php

use Illuminate\Database\Seeder;

class SeedCamiones extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Camiones')->insert([
            'idCamion' => 1,
            'idRuta'=> 3,
            'unidad' => 10,
            'asientos' => 26,
            'capacidadMaxima' => 24,
            'rpmMax' => rand(1,7000),
            'velMax' => rand(1,80),
            'macAddress' => str_random(25),
        ]);
        DB::table('Camiones')->insert([
        	'idCamion' => 2,
            'idRuta'=> 3,
            'unidad' => 8,
            'asientos' => 14,
            'capacidadMaxima' => 45,
            'rpmMax' => rand(1,7000),
            'velMax' => rand(1,80),
            'macAddress' => "RKYjcZWezDB",
        ]);
        DB::table('Camiones')->insert([
            'idCamion' => 3,
            'idRuta'=> 3,
            'unidad' => 100,
            'asientos' => 80,
            'capacidadMaxima' => 80,
            'rpmMax' => 80,
            'velMax' => 80,
            'macAddress' => 202481601069115,
        ]);
        DB::table('Camiones')->insert([
            'idCamion' => 4,
            'idRuta'=> 3,
            'unidad' => 10,
            'asientos' => 26,
            'capacidadMaxima' => 24,
            'rpmMax' => rand(1,7000),
            'velMax' => rand(1,80),
            'macAddress' => str_random(25),
        ]);
    }
}
