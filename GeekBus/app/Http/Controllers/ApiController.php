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
        /*recibe 
            ::lat?%lf
            ::long?%lf
            ::limit?%d
            ::offset?%d
        */

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

        /*repuesta 
        [
            ::nombre?%s
            ::id?%d
            ::salida
            {
                ::id?%d
                ::nombre?%s
                ::lat?%lf
                ::long?%lf
            }
            ::destino
            {
                ::id?%d
                ::nombre?%s
                ::lat?%lf
                ::long?%lf
            }
        ]
        */
        return void;
    }

    public function getInfoRuta(Request $request)
    {
        /*recibe 
            {rutaId}
        */
        $rutaId = $request;

        /*respuesta 
            ::nombre?%s
            ::id?%d
            ::paradas
            [
                {
                    ::nombre?%s
                    ::id?%d
                    ::lat?%lf
                    ::long?%lf
                    ::autobus
                    {
                        ::id?%d
                        ::tiempo?%datetime
                        ::numerototal?%d
                        ::numeroocupado?%d
                    }
                }
            ]
        */


        $restult = array();

        $books = DB::table('Rutas')->where('Rutas.idRuta','=', $rutaId)->join('ParadaCamiones','ParadaCamiones.idRuta','=','Rutas.idRuta')->join('Paradas','Paradas.idParada','=','ParadaCamiones.idParada')->select('*')->get();

        foreach ($books as $key => $value) {
            $camiones = DB::table('ParadaCamiones')->where([['ParadaCamiones.idParada','=', 1], ['Eventos.idTipoEvento','=', 7]])->join('Rutas','Rutas.idRuta','=','Rutas.idRuta')->leftJoin('Camiones','Camiones.idRuta','=','Rutas.idRuta')->join('Eventos','Eventos.idCamion','=','Camiones.idCamion')->select('Camiones.idCamion', 'Eventos.idTipoEvento')->distinct()->orderBy('Eventos.fechahora')->get();
            $value->camiones = array();
            array_push($value->camiones, $camiones);
        }
        

        return json_encode($books); 
    }

    public function getParadas($request)
    {
        /*recibe
            ::lat?%lf
            ::long?%lf
            ::limit?%d
            ::offset?%d
        */

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

        /*Respuesta
        {
            [
                {   
                    "id" : int,
                    "nombre": string,
                    "lat": double,
                    "lon": double
                },   …
            ]
        }
        */


        // $respuesta = json_encode($assoc);

        return void; 
    }

    public function getParadaRutas($request)
    {
        /*recibe 
            {paradaId}
        */
            $paradaId = $request;

        /*
        Respuesta
        {
            "id" : int,
            "nombre": string,
            "lat": double,
            "lon": double
            "autobuses":
            [
                {
                    "id": int,
                    “nombre” : string,
                    "tiempo": datetime,
                    "numerototal": int,
                    "numeroocupado": int
                    "ruta":
                    {
                        “nombre” : string,
                        “id” : int,
                        “salida” : 
                        {   
                            "id" : int,
                            "nombre": string,
                            "lat": double,
                            "lon": double
                        },
                        “destino”: 
                        {   
                            "id" : int,
                            "nombre": string,
                            "lat": double,
                            "lon": double
                        }   
                    }
                },   …
            ]
        }
        */
        $restult = array();

        $books = DB::table('ParadaCamiones')->where('ParadaCamiones.idParada','=', $paradaId)->join('Rutas','Rutas.idRuta','=','ParadaCamiones.idRuta')->join('Paradas','Paradas.idParada','=','ParadaCamiones.idParada')->get();

        foreach ($books as $key => $value) {
            $camiones = DB::table('Rutas')->where('Rutas.idRuta','=', $value->idRuta)->join('Camiones','Camiones.idRuta','=','Rutas.idRuta')->leftJoin('Ubicaciones','Ubicaciones.idCamion','=','Camiones.idCamion')->select(DB::raw('Camiones.idCamion,Camiones.idRuta, Rutas.nombre,distlatlon('.$value->lat.', '.$value->long.', Ubicaciones.lat,Ubicaciones.long) as dis'))->orderby('dis', 'asc')->get();
            $value->camiones = $camiones;
            foreach ($camiones as $key => $valuec){
                $paradas = DB::table('Camiones')->where('Camiones.idCamion','=', $valuec->idCamion)->join('Rutas','Rutas.idRuta','=','Camiones.idRuta')->join('ParadaCamiones','ParadaCamiones.idRuta','=','Rutas.idRuta')->join('Paradas','Paradas.idParada','=','ParadaCamiones.idParada')->select('Paradas.idParada', 'Paradas.Nombre', 'Paradas.lat', 'Paradas.long')->get();
                $valuec->tiempo = $valuec->dis/666.6667;
                $valuec->paradas = $paradas;
            }
        }
        

        return json_encode($books);
    }

    public function getParadasRutasCercanas(Request $request)
    {
        /*
        Solicitud
        {
            “lat”: double,
            “lon”: double,
            “limit”: int,
            “offset” int
        }
        */
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

        $lat = 19.028503;
        $lon = -98.232665;
        $limit = 3;
        $offset = 0;
        
        /*Respuesta
        {
            [
                {                       
                    "idParada" : int,
                    "nombre": string,
                    "lat": double,
                    "lon": double
                    "rutas": [
                        {
                            "idRuta": int,
                            "nombre": string,
                            "salida": string,
                            "destino": string
                        },...
                    ]
                }, ...
            ]
        }
        */
        $restult = array();

        $books = DB::table('Paradas')->select(DB::raw('*,distlatlon(Paradas.lat, Paradas.long, '.$lat.','.$lon.') as dis'))->orderby('dis', 'asc')->limit($limit)->offset($offset)->get();

        foreach ($books as $key => $value) {
            $dist = DB::table('ParadaCamiones')->where('ParadaCamiones.idParada','=', $value->idParada)->join('Rutas','Rutas.idRuta','=','ParadaCamiones.idRuta')->select('*')->get();
            $value->tiempo = $value->dis/666.6667;
            $value->rutas = $dist;
        }

        return json_encode($books);
    }
}
