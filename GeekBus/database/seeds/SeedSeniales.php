<?php

use Illuminate\Database\Seeder;

class SeedSeniales extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Seniales')->insert([
        	'idSenial' => 7,
            'idCamion' => 2,
        ]);
    }
}
