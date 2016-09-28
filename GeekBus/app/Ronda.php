<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ronda extends Model
{
    protected $table = "Rondas";

    protected $fillable = ['idRonda', 'idConductor', 'idCamion', 'entrada', 'salida'];

    protected $primaryKey = "idRonda";

    public function Ruta()
    {
        return $this->hasOne('App\Ruta', 'foreign_key', 'idConductor');
    }

    public function Camion()
    {
        return $this->hasOne('App\Camion', 'foreign_key', 'idCamion');
    }
}
