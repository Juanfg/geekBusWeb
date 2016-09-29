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
       	    'idRuta'=> 3,
            'nombre' => str_random(30),
            'descripcion' => str_random(225) ,
        ]);
    }
}
