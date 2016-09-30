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
            'idEvento' => 1,
            'idCamion' => 2,
            'fechahora' => '2016-10-20 14:12:36',
            'idTipoEvento' => 7,
            'valor' => 1,
            'conductor' => 5,
        ]);
        DB::table('Eventos')->insert([
            'idEvento' => 2,
            'idCamion' => 3,
            'fechahora' => '2016-11-20 14:12:36',
            'idTipoEvento' => 7,
            'valor' => 1,
            'conductor' => 5,
        ]);
        DB::table('Eventos')->insert([
            'idEvento' => 3,
            'idCamion' => 4,
            'fechahora' => '2016-12-20 14:12:36',
            'idTipoEvento' => 7,
            'valor' => 1,
            'conductor' => 5,
        ]);
        DB::table('Eventos')->insert([
            'idEvento' => 4,
            'idCamion' => 4,
            'fechahora' => '2016-12-22 14:12:36',
            'idTipoEvento' => 4,
            'valor' => 1,
            'conductor' => 5,
        ]);
        DB::table('Eventos')->insert([
            'idEvento' => 5,
            'idCamion' => 4,
            'fechahora' => '2016-12-24 14:12:36',
            'idTipoEvento' => 4,
            'valor' => 3,
            'conductor' => 5,
        ]);
    }
}
