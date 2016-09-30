<?php

namespace App\Http\Controllers;

use Validator;

use Illuminate\Http\Request;

use App\Http\Requests;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\DB;

use App\Http\Controllers\Controller;

class ApiController extends Controller
{
    public function getRutas(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'lat' => 'required|numeric',
            'long' => 'required|numeric',
            'limit' => 'required|numeric',
            'offset' => 'required|numeric'
        ]);

        if ($validator->fails()) {
            return "Success false";
        }

        $lat = $request->lat;
        $long = $request->long;
        $limit = $request->limit;
        $offset = $request->offset;

        return void;
    }

    public function getInfoRuta(Request $request)
    {
        $rutaId = $request;

        $restult = array();

        $books = DB::table('Rutas')->where('Rutas.idRuta','=', $rutaId)->join('ParadaCamiones','ParadaCamiones.idRuta','=','Rutas.idRuta')->join('Paradas','Paradas.idParada','=','ParadaCamiones.idParada')->select('*')->get();

        foreach ($books as $key => $value) {
            $camiones = DB::table('ParadaCamiones')->where([['ParadaCamiones.idParada','=', $value->$idParada], ['Eventos.idTipoEvento','=', 7]])->join('Rutas','Rutas.idRuta','=','Rutas.idRuta')->leftJoin('Camiones','Camiones.idRuta','=','Rutas.idRuta')->join('Eventos','Eventos.idCamion','=','Camiones.idCamion')->select('Camiones.idCamion', 'Eventos.idTipoEvento')->distinct()->orderBy('Eventos.fechahora')->get();
            $value->camiones = array();
            array_push($value->camiones, $camiones);
        }
        
        return json_encode($books); 
    }

    public function getParadas($request)
    {
        $validator = Validator::make($request->all(), [
            'lat' => 'required|numeric',
            'long' => 'required|numeric',
            'limit' => 'required|numeric',
            'offset' => 'required|numeric'
        ]);

        if ($validator->fails()) {
            return "Success false";
        }

        $lat = $request->lat;
        $long = $request->long;
        $limit = $request->limit;
        $offset = $request->offset;

        return void; 
    }

    public function getParadaRutas($request)
    {
        $paradaId = $request;

        $restult = array();

        $books = DB::table('ParadaCamiones')->where('ParadaCamiones.idRuta','=', $paradaId)->join('Paradas','Paradas.idParada','=','ParadaCamiones.idParada')->select('Paradas.idParada', 'Paradas.Nombre', 'Paradas.lat', 'Paradas.long')->get();

        foreach ($books as $key => $value) {
            $rutas = DB::table('ParadaCamiones')->where([['ParadaCamiones.idParada','=', $value->idParada], ['Eventos.idTipoEvento','=', 7]])->join('Rutas','Rutas.idRuta','=','Rutas.idRuta')->leftJoin('Camiones','Camiones.idRuta','=','Rutas.idRuta')->join('Eventos','Eventos.idCamion','=','Camiones.idCamion')->join('Ubicaciones','Ubicaciones.idCamion','=','Camiones.idCamion')->select('Camiones.idCamion', 'Eventos.idTipoEvento')->select(DB::raw('Camiones.idRuta, Rutas.nombre,distlatlon('.$value->lat.', '.$value->long.', Ubicaciones.lat,Ubicaciones.long) as dis'))->distinct()->orderBy('Eventos.fechahora', 'asc')->get();
            $value->rutas = $rutas;
            foreach ($rutas as $key => $valuec){
                $valuec->tiempo = $valuec->dis/666.6667;
            }
        }

        return json_encode($books);
    }

    public function getParadasRutasCercanas(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'lat' => 'required|numeric',
            'long' => 'required|numeric',
            'limit' => 'required|numeric',
            'offset' => 'required|numeric'
        ]);

        if ($validator->fails()) {
            return "Success false";
        }

        $lat = $request->lat;
        $long = $request->long;
        $limit = $request->limit;
        $offset = $request->offset;

        $restult = array();

        $books = DB::table('Paradas')->select(DB::raw('Paradas.idParada, Paradas.nombre, Paradas.lat, Paradas.long ,distlatlon(Paradas.lat, Paradas.long, '.$lat.','.$long.') as dis'))->orderby('dis', 'asc')->limit($limit)->offset($offset)->get();

        foreach ($books as $key => $value) {
            $rutas = DB::table('ParadaCamiones')->where([['ParadaCamiones.idParada','=', $value->idParada], ['Eventos.idTipoEvento','=', 7]])->join('Rutas','Rutas.idRuta','=','Rutas.idRuta')->leftJoin('Camiones','Camiones.idRuta','=','Rutas.idRuta')->join('Eventos','Eventos.idCamion','=','Camiones.idCamion')->join('Ubicaciones','Ubicaciones.idCamion','=','Camiones.idCamion')->select('Camiones.idCamion', 'Eventos.idTipoEvento')->select(DB::raw('Camiones.idRuta, Rutas.nombre,distlatlon('.$value->lat.', '.$value->long.', Ubicaciones.lat,Ubicaciones.long) as dis'))->distinct()->orderBy('Eventos.fechahora', 'asc')->get();
            $value->tiempo = $value->dis/66.6667;
            $value->rutas = $rutas;
            foreach ($rutas as $key => $valuec){
                $valuec->tiempo = $valuec->dis/666.6667;
            }
        }
        return json_encode($books);
    }
}
