<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Conductor extends Model
{
    protected $table = "Conductores";

    protected $fillable = ['idConductor', 'nombre', 'fotoPath', 'loginKey'];

    protected $primaryKey = "idConductor";

    public function Ronda()
    {
        return $this->hasMany('Ronda');
    }

    public function Evento()
    {
        return $this->hasMany('Evento');
    }
}
