<?php

use Illuminate\Database\Seeder;

class SeedTipoEventos extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('TipoEventos')->insert([
            'idTipoEvento' => 7,
            'descrpcion' => str_random (30),
        ]);
    }
}
