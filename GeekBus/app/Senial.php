<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Senial extends Model
{
    protected $table = "Seniales";

    protected $fillable = ['idSenial', 'idCamion', 'modificadoEn'];

    protected $primaryKey = "idSenial";

    public function camion()
    {
        return $this->belongsTo('App\Camion', 'idCamion');
    }
}
