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
            'Nombre' => 'Cluster 121212',
            'lat' => '19.0023' ,
            'long' => '-98.2687',
        ]);
        DB::table('Paradas')->insert([
            'idParada'=> 4,
            'Nombre' => 'Universidad',
            'lat' => '18.9934' ,
            'long' => '-98.2739',
        ]);
        DB::table('Paradas')->insert([
            'idParada'=> 5,
            'Nombre' => 'Sonata',
            'lat' => '18.9946' ,
            'long' => '-98.279',
        ]);
        DB::table('Paradas')->insert([
            'idParada'=> 6,
            'Nombre' => 'BlvdAsiaentreParquedelaPlatayTerranova',
            'lat' => '18.9913' ,
            'long' => '-98.2817',
        ]);
    }
}
