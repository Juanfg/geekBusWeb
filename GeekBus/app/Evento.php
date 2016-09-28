<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    protected $table = "Eventos";

    protected $fillable = ['idEvento', 'idCamion', 'fechahora', 'idTipoEvento', 'valor', 'conductor'];

    protected $primaryKey = "idEvento";

    public function incidencias()
    {
        return $this->hasMany('App\Incidencia', 'idIncidencia');
    }

    public function camion()
    {
        return $this->belongsTo('App\Camion', 'idCamion');
    }

    public function conductor()
    {
        return $this->belongsTo('App\Conductor', 'idConductor');
    }

    public function tipoEvento()
    {
        return $this->belongsTo('App\TipoEvento', 'idTipoEventos');
    }
}
