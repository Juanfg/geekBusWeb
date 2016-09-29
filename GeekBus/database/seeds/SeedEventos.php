<?php

use Illuminate\Database\Seeder;

class SeedEventos extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Eventos')->insert([
            'idEvento' => 4,
            'idCamion' => 2,
            'fechahora' => '2016-09-28 14:12:36',
            'idTipoEvento' => 2,
            'valor' => 6,
            'conductor' => 5,
        ]);
    }
}
