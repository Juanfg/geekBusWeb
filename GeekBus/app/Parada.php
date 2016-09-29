<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Parada extends Model
{
    protected $table = "Paradas";

    protected $fillable = ['idParada', 'nombre', 'lat', 'long'];

    protected $primaryKey = "idParada";

    public function camiones()
    {
        return $this->belongsToMany('App\Ruta', 'ParadaCamiones', 'idParada', 'idRuta');
    }
}
