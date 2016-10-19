<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function dashboard()
    {
        $camionesFecha = DB::select(DB::raw("select idCamion, max(fechahora) as fechahora from `Ubicaciones` group by `idCamion`"));

        $array = [];
        foreach ($camionesFecha as $buscado){

            $data = DB::table('Ubicaciones')->where('fechahora', $buscado->fechahora)->where('Camiones.idCamion', $buscado->idCamion)->join('Camiones', 'Camiones.idCamion', 'Ubicaciones.idCamion')->join('Rutas', 'Rutas.idRuta', 'Camiones.idRuta')->select('Camiones.idCamion as idAutobus', 'lat', 'long', 'Rutas.nombre as nombre', 'Camiones.unidad')->first();
            array_push($array, $data);
        }
        return view('layouts.contentDashboard', ['autobuses' => $array]);;
    }
}
