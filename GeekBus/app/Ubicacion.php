<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ubicacion extends Model
{
    protected $table = "Ubicaciones";

    protected $fillable = ['idCamion', 'fechahora', 'lat', 'long'];

    public function Camion()
    {
        return $this->belongsTo('App\Camion');
    }
}
