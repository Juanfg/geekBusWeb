<?php

use Illuminate\Database\Seeder;

class SeedRondas extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Rondas')->insert([
        	'idRonda' => 7,
        	'idConductor' => 5,
        	'idCamion' => 2,
        	'entrada' => '2016-09-28 08:02:36' ,
        	'salida' => '2016-09-28 16:48:35',
        ]);
    }
}
