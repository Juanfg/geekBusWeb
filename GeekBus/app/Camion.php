<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Camion extends Model
{
    protected $table = "Camiones";

    protected $fillable = [
        'idCamion', 'idRuta', 'unidad', 'asientos', 'capacidadMaxima',
        'rpmMax', 'velMax', 'macAddress'
        ];

    protected $primaryKey = "idCamion";

    public function Ruta()
    {
        return $this->hasOne('App\Ruta', 'foreign_key', 'idRuta');
    }

    public function Ubicacion()
    {
        return $this->hasMany('App\Ubicacion');
    }

    public function Evento()
    {
        return $this->hasMany('App\Evento');
    }
}
