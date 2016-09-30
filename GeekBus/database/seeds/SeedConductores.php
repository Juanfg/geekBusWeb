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
            'fotoPath' => 'public/512eec0b26358aff88d97778bbea35a1.jpeg',
            'loginKey' => '1234',
        ]);
        DB::table('Conductores')->insert([
            'idConductor' => 6,
            'nombre' => 'JP',
            'fotoPath' => 'public/8beac075961f78b3eba33f4889c6a2ce.jpeg',
            'loginKey' => '12345',
        ]);
        DB::table('Conductores')->insert([
            'idConductor' => 1,
            'nombre' => 'Davila',
            'fotoPath' => 'public/bb643dd584ae773c76a3e2d90067e2e4.jpeg',
            'loginKey' => 'tSDXu46imTL1Xp37dEFeiph5FxLC19+x2DyIoMgeW8I=',
        ]);
    }
}
