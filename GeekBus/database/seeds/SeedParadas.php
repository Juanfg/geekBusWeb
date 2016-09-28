<?php

use Illuminate\Database\Seeder;

class SeedParadas extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Paradas')->insert([
        	'idParada'=> 1
            'Nombre' => 'Abasto Restaurante',
            'lat' => '18.992691' ,
            'long' => '98.277810',
        ]);
    }
}
