<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
	    $this->call(SeedUsers::class);
	    $this->call(SeedConductores::class);
	    $this->call(SeedRutas::class);
	    $this->call(SeedCamiones::class);
	  	$this->call(SeedTipoEventos::class);

	    /*
	    conductores
	    rutas
	    camiones

	    */
    }
}
