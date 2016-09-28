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
            'idParadaCamion' => 4, 
            'idRuta' => 3,
            'idParada' => 1,
            'numParada' => 8,
        
        ]);
    }
}
