<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Parada extends Model
{
    protected $table = "Paradas";

    protected $fillable = ['idParada', 'nombre', 'lat', 'long'];

    protected $primaryKey = "idParada";

    public function ParadaCamion()
    {
        return $this->belongsToMany('ParadaCamion');
    }
}
