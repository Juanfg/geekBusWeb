<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ruta extends Model
{
    protected $table = "Rutas";

    protected $fillable = ['idRuta', 'nombre', 'descripcion'];

    protected $primaryKey = "idRuta";

    public function paradas()
    {
        return $this->belongsToMany('App\Parada', 'ParadaCamiones', 'idRuta', 'idParada');
    }
}
