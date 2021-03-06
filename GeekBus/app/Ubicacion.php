<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ubicacion extends Model
{
    protected $table = "Ubicaciones";

    protected $fillable = ['idUbicacion', 'idCamion', 'fechahora', 'lat', 'long'];

    protected $primaryKey = "idUbicacion";

    public function camion()
    {
        return $this->belongsTo('App\Camion', 'idCamion');
    }
}
