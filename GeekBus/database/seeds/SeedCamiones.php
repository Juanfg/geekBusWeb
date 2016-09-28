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
        	'idCamion' => 2,
            'idRuta'=> 3,
            'unidad' => 8,
            'asientos' => 14,
            'capacidadMaxima' => 45,
            'rpmMax' => int_random(10),
            'velMax' =>int_random(10),
            'macAdrdress' => str_random(256),
        ]);
    }
}
