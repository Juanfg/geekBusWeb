<?php

use Illuminate\Database\Seeder;

class SeedConductores extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('Conductores')->insert([
         	'idConductor' => 5,
            'nombre' => 'Jose',
            'fotoPath' => 'images/12921b36b8b54bb0ada9ec79e68c3760.png',
            'loginKey' => '1234',
        ]);
        DB::table('Conductores')->insert([
            'idConductor' => 6,
            'nombre' => 'JP',
            'fotoPath' => 'images/8beac075961f78b3eba33f4889c6a2ce.jpeg',
            'loginKey' => '12345',
        ]);
        DB::table('Conductores')->insert([
            'idConductor' => 1,
            'nombre' => 'Davila',
            'fotoPath' => 'images/12921b36b8b54bb0ada9ec79e68c3760.png',
            'loginKey' => 'tSDXu46imTL1Xp37dEFeiph5FxLC19+x2DyIoMgeW8I=',
        ]);
    }
}
