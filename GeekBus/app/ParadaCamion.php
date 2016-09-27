<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ParadaCamion extends Model
{
    protected $table = "ParadaCamiones";

    protected $fillable = ['idRuta', 'idParada', 'numParada'];

    public function Parada()
    {
        return $this->hasOne('Parada');
    }

    public function Ruta()
    {
        return $this->hasOne('Ruta');
    }
}
