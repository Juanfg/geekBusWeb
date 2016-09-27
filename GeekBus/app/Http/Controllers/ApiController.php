<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class ApiController extends Controller
{
    public function getRutas()
    {
        return "get rutas <todas>"; 
    }

    public function getInfoRuta($idRutas)
    {
        return "get rutas <".$idRutas.">";
    }

    public function getParadas()
    {
        return "get paradas <todas>";
    }

    public function getParadaRutas($idParadas)
    {
        return "get paradas <".$idParadas.">";
    }

    public function getParadasRutasCercanas()
    {
        return "get paradas rutas cercanas <orden>";
    }
}
