<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ruta extends Model
{
    protected $table = "Rutas";

    protected $fillable = ['idRuta', 'nombre', 'descripcion'];

    protected $primaryKey = "idRuta";

    public function Camion()
    {
        return $this->belongsToMany('App\Camion');
    }

    public function ParadaCamion()
    {
        return $this->belongsToMany('ParadaCamion');
    }
}
