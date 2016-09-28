<?php

use Illuminate\Database\Seeder;

class SeedIncidencias extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Incidencias')->insert([
        	'idIncidencia' => 3,
            'idEvento' => 4,
        ]);
    }
}
