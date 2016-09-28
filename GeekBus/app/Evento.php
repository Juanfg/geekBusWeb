<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    protected $table = "Eventos";

    protected $fillable = ['idCamion', 'fechahora', 'idTipoEvento', 'valor', 'conductor'];

    protected $primaryKey = "idEvento";

    public function Camion()
    {
        return $this->belongsTo('Camion');
    }

    public function Conductor()
    {
        return $this->belongsTo('Conductor');
    }

    public function TipoEvento()
    {
        return $this->belongsTo('TipoEvento');
    }
}
