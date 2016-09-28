<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

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
        //TEST
        $nombreGlobal = "nglobal";
        $idGlobal = 123;

        $idSalida = 234;
        $nombreSalida = "nSalida";
        $latSalida = 20.15;
        $longSalida = 14.86;

        $idDestino = 243;
        $nombreDestino = "nDestino";
        $latDestino = 17.87;
        $longDestino = 13.14159;

        //JSON ARRAY FORMAT
        $assoc = array(
            "nombre"=>$nombreGlobal,
            "id"=>$idGlobal,
            "salida"=>array(
                "id"=>$idSalida,
                "nombre"=>$nombreSalida,
                "lat"=>$latSalida,
                "long"=>$longSalida
            ),
            "destino"=>array(
                "id"=>$idDestino,
                "nombre"=>$nombreDestino,
                "lat"=>$latDestino,
                "long"=>$longDestino
                )
            );

        $respuesta = json_encode($assoc);

        return $respuesta; 
    }

    public function getInfoRuta($request)
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
        //TEST
        return "void";
    }

    public function getParadas(Request $request)
    {
        /*recibe
            ::lat?%lf
            ::long?%lf
            ::limit?%d
            ::offset?%d
        */
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
        return "void";
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
        return "void";
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
        $lat = $request->lat;
        $long = $request->long;
        $limit = $request->limit;
        $offset = $request->offset;
        
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

        return "void";
    }
}
