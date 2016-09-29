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
    	$this->call(SeedRutas::class);
    	$this->call(SeedTipoEventos::class);
    	$this->call(SeedCamiones::class);
    	$this->call(SeedConductores::class);
    	$this->call(SeedRondas::class);
    	$this->call(SeedSeniales::class);
    	$this->call(SeedUbicaciones::class);
    	$this->call(SeedParadas::class);
    	$this->call(SeedParadaCamiones::class);
    	$this->call(SeedEventos::class);
    	$this->call(SeedIncidencias::class);
    	$this->call(SeedProcedure::class);
	    $this->call(SeedUsers::class);
	  	
	    /*
	    conductores
	    rutas
	    camiones

	    */
    }
}
