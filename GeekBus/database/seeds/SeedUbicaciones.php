<?php

use Illuminate\Database\Seeder;

class SeedUbicaciones extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Ubicaciones')->insert([
        	'idUbicacion' => 1,
            'idCamion' => 1,
            'fechahora' => '2016-09-28 13:25:43',
            'lat' => '19.017260',
            'long' => '-98.252070',
        ]);
        DB::table('Ubicaciones')->insert([
            'idUbicacion' => 2,
            'idCamion' => 2,
            'fechahora' => '2016-09-28 13:25:43',
            'lat' => '19.017260',
            'long' => '-98.252059',
        ]);
        DB::table('Ubicaciones')->insert([
            'idUbicacion' => 3,
            'idCamion' => 3,
            'fechahora' => '2016-09-28 13:25:43',
            'lat' => '19.017260',
            'long' => '98.252065',
        ]);
        DB::table('Ubicaciones')->insert([
            'idUbicacion' => 4,
            'idCamion' => 4,
            'fechahora' => '2016-09-28 13:25:43',
            'lat' => '19.017260',
            'long' => '98.252051',
        ]);
    }
}
