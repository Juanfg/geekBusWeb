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
        	'idParada'=> 1,
            'Nombre' => 'Plaza Aventura',
            'lat' => '19.00699006' ,
            'long' => '-98.2687156',
        ]);
        DB::table('Paradas')->insert([
            'idParada'=> 2,
            'Nombre' => 'Cluster 111',
            'lat' => '18.9983' ,
            'long' => '-98.2631',
        ]);
        DB::table('Paradas')->insert([
            'idParada'=> 3,
            'Nombre' => 'Cluster 122',
            'lat' => '18.9983' ,
            'long' => '-98.2631',
        ]);
    }
}
