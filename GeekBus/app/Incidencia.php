<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Incidencia extends Model
{
    protected $table = "Incidencias";

    protected $fillable = ['idIncidencia', 'idEvento'];

    protected $primaryKey = "idIncidencia";

    public function Evento()
    {
        return $this->hasOne('App\Evento', 'foreign_key', 'idEvento');
    }
}
