<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    protected $table = "Eventos";

    protected $fillable = ['idEvento', 'idCamion', 'fechahora', 'idTipoEvento', 'valor', 'conductor'];

    protected $primaryKey = "idEvento";

    public function Camion()
    {
        return $this->hasOne('App\Camion', 'foreign_key', 'idCamion');
    }

    public function TipoEvento()
    {
        return $this->hasOne('App\TipoEvento', 'foreign_key', 'idTipoEvento');
    }

    public function Conductor()
    {
        return $this->hasOne('App\Conductor', 'foreign_key', 'idConductor');
    }
}
