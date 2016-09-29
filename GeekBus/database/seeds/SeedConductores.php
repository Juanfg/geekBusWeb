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
            'fotoPath' => 'https://www.google.com.mx/search?q=gatos&rlz=1C1CHMO_esMX558MX559&source=lnms&tbm=isch&sa=X&ved=0ahUKEwiLxZH1zbLPAhXMxYMKHTbiDboQ_AUICCgB&biw=1600&bih=770#imgrc=ImXCez8SV0GJTM%3A',
            'loginKey' => '1234',
        ]);
        DB::table('Conductores')->insert([
            'idConductor' => 6,
            'nombre' => 'JP',
            'fotoPath' => 'https://www.google.com.mx/search?q=gatos&rlz=1C1CHMO_esMX558MX559&source=lnms&tbm=isch&sa=X&ved=0ahUKEwiLxZH1zbLPAhXMxYMKHTbiDboQ_AUICCgB&biw=1600&bih=770#imgrc=ImXCez8SV0GJTM%3A',
            'loginKey' => '12345',
        ]);
    }
}
