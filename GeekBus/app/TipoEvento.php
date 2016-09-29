<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoEvento extends Model
{
    protected $table = "TipoEventos";

    protected $fillable = ['idTipoEvento', 'descripcion'];

    protected $primaryKey = "idTipoEvento";
    
    public function eventos()
    {
        return $this->hasMany('App\Evento', 'idEvento');
    }

    // A partir de aqui se hard-codean los valores de los posibles eventos para realizar queries

    static $encendido = 1;
    static $apagado = 2;
    static $rpm = 3;
    static $pasajeros = 4;
    static $temperatura = 5;
    static $velocidad = 6;
    static $parada = 7;
}
