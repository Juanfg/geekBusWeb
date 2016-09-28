<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ronda extends Model
{
    protected $table = "Rondas";

    protected $fillable = ['idRonda', 'idConductor', 'idCamion', 'entrada', 'salida'];

    protected $primaryKey = "idRonda";
}
