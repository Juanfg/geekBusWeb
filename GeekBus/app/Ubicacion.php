<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ubicacion extends Model
{
    protected $table = "Ubicaciones";

    protected $fillable = ['idUbicacion', 'idCamion', 'fechahora', 'lat', 'long'];

    protected $primaryKey = "idUbicacion";

    public function Camion()
    {
        return $this->hasOne('App\Camion', 'foreign_key', 'idCamion');
    }
}
