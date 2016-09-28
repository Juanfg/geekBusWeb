<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoEvento extends Model
{
    protected $table = "TipoEventos";

    protected $fillable = ['idTipoEvento', 'descripcion'];

    protected $primaryKey = "idTipoEvento";
    
    public function evento()
    {
        return $this->hasMany('App\Evento', 'idEvento');
    }
}
