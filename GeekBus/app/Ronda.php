<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ronda extends Model
{
    protected $table = "Rondas";

    protected $fillable = ['conductor', 'entrada', 'salida'];

    public function Conductor()
    {
        return $this->belongsTo('Conductor');
    }
}
