<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Senial extends Model
{
    protected $table = "Seniales";

    protected $fillable = ['idSenial', 'idCamion'];

    protected $primaryKey = "idSenial";

    public function Camion()
    {
         return $this->hasOne('App\Camion', 'foreign_key', 'idCamion');
    }
}
