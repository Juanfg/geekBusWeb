<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Senial extends Model
{
    protected $table = "Seniales";

    protected $fillable = ['idCamion', 'fechahora'];

    public function Camion()
    {
         return $this->belongsTo('App\Camion');
    }
}
