<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Ronda;

class Camion extends Model
{
    protected $table = "Camiones";

    protected $fillable = [
        'idCamion', 'idRuta', 'unidad', 'asientos', 'capacidadMaxima',
        'rpmMax', 'velMax', 'macAddress'
        ];

    protected $primaryKey = "idCamion";

    public function senial()
    {
        return $this->hasOne('App\Senial', 'idSenial');
    } 

    public function rondas()
    {
        return $this->hasMany('App\Ronda', 'idRonda');
    }

    public function eventos()
    {
        return $this->hasMany('App\Evento', 'idEvento');
    }

    public function ubicaciones()
    {
        return $this->hasMany('App\Ubicacion', 'idUbicacion');
    }

    public function ruta()
    {
        return $this->belongsTo('App\Ruta', 'idRuta');
    }

    public static function activo($id){
        return Ronda::where('idCamion', $id)->where('salida', null)->count() != 0;
    }
}
