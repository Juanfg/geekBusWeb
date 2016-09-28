<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ParadaCamion extends Model
{
    protected $table = "ParadaCamiones";

    protected $fillable = ['idParadaCamion', 'idRuta', 'idParada', 'numParada'];

    protected $primaryKey = "idParadaCamion";

    public function Parada()
    {
        return $this->hasOne('App\Parada', 'foreign_key', 'idParada');
    }

    public function Ruta()
    {
        return $this->hasOne('App\Ruta', 'foreign_key', 'idRuta');
    }
}
