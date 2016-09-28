<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ubicacion extends Model
{
    protected $table = "Ubicaciones";

    protected $fillable = ['idCamion', 'fechahora', 'lat', 'long'];

    protected $primaryKey = "idUbicacion";

    public function Camion()
    {
        return $this->belongsTo('App\Camion');
    }
}
