<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use App\Evento;
use App\TipoEvento;
use App\Camion;
use App\Incidencia;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //Este observer se encargara de popular incidencias en caso de ser necesario
        Evento::created(function ($evento) {

            $camion = Camion::find($evento->idCamion);
            $incident = false;

            if($evento->idTipoEvento == TipoEvento::$rpm)
            {
                if($evento->valor > $camion->rpmMax)
                    $incident = true;
            }
            else if($evento->idTipoEvento == TipoEvento::$velocidad){
                if($evento->valor > $camion->velMax)
                    $incident = true;
            }
            else if($evento->idTipoEvento == TipoEvento::$pasajeros){
                if($evento->valor > $camion->capacidadMaxima)
                    $incident = true;
            }

            if($incident)
                Incidencia::create(['idEvento'=>$evento->idEvento]);
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
