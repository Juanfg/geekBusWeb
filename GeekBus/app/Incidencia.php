<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Incidencia extends Model
{
    protected $table = "Incidencias";

    protected $fillable = ['idIncidencia', 'idEvento'];

    protected $primaryKey = "idIncidencia";

    public function evento()
    {
        return $this->belongsTo('App\Evento', 'idEvento');
    }
}
