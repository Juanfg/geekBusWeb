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
            'rpmMax' => rand(1,7000),
            'velMax' => rand(1,80),
            'macAddress' => "RKYjcZWezDBoed2j0LbuwAIyJqjTkVe7ObtXt77C4nwzgL7oEOqgo3CMRJKsIOXCMzv4txVox8FnGIIVuRiSwqGrTjidQ1X1cOak4hQGDAe4gzvKfELOEFlz0zRxQNuzNEs3nCWTnaF09WC5o5JmizKV88v8DIKC3TQZv3BYWfYI1c363Fn27j5scV7FlthLwO95xSGW2CRt9twAtY0ieMa3d43TEmlBrpQDrMY94apuL6luiQ4WKuawRsQ3BK",
        ]);
        DB::table('Camiones')->insert([
            'idCamion' => 3,
            'idRuta'=> 3,
            'unidad' => 10,
            'asientos' => 26,
            'capacidadMaxima' => 24,
            'rpmMax' => rand(1,7000),
            'velMax' => rand(1,80),
            'macAddress' => str_random(254),
        ]);
    }
}
