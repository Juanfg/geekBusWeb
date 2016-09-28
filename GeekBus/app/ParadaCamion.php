<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ParadaCamion extends Model
{
    protected $table = "ParadaCamiones";

    protected $fillable = ['idParadaCamion', 'idRuta', 'idParada', 'numParada'];

    protected $primaryKey = "idParadaCamion";
}
