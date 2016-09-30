<?php

use Illuminate\Database\Seeder;

class SeedParadaCamiones extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ParadaCamiones')->insert([
            'idParadaCamion' => 1, 
            'idRuta' => 3,
            'idParada' => 1,
            'numParada' => 8,
        
        ]);
        DB::table('ParadaCamiones')->insert([
            'idParadaCamion' => 2, 
            'idRuta' => 2,
            'idParada' => 1,
            'numParada' => 8,
        
        ]);
        DB::table('ParadaCamiones')->insert([
            'idParadaCamion' => 3, 
            'idRuta' => 4,
            'idParada' => 2,
            'numParada' => 8,
        
        ]);
        DB::table('ParadaCamiones')->insert([
            'idParadaCamion' => 4, 
            'idRuta' => 5,
            'idParada' => 2,
            'numParada' => 8,
        
        ]);
    }
}
