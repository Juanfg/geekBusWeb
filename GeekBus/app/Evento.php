<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    protected $table = "Eventos";

    protected $fillable = ['idEvento', 'idCamion', 'fechahora', 'idTipoEvento', 'valor', 'conductor'];

    protected $primaryKey = "idEvento";
}
