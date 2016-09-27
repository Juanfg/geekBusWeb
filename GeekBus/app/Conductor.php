<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Conductor extends Model
{
    protected $table = "Conductores";

    protected $fillable = ['idConductor', 'nombre', 'fotoPath', 'loginKey'];

    public function Ronda()
    {
        return $this->hasMany('Ronda');
    }

    public function Evento()
    {
        return $this->hasMany('Evento');
    }
}
