<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class RaspBerry extends Controller
{
    public function login(Request $request)
    {
        /*recibe 
            ::chofer?%s
            ::idRuta?%s
        */
        $chofer = $request->chofer;
        $ruta = $request->idRuta;

        /*repuesta 
            ::success?%b
            ::auth?%d
        */
        $success = true;
        $auth = 123;

        $assoc = array("success"=>$success,"auth"=>$auth);
        $respuesta = json_encode($assoc);
        return $respuesta;
    }

    public function update(Request $request)
    {
        /*recibe 
            ::auth?%d
            ::rpm?%d
            ::pasajeros?%d
            ::velocidad?%d
            ::lat?%lf
            ::long?%lf
        */
        $auth = $request->auth;
        $rpm = $request->rpm;
        $pasajeros = $request->pasajeros;
        $velocidad = $request->velocidad;
        $lat = $request->lat;
        $long = $request->long;

        /*respuesta 
            ::success?%b
        */
        $success = true;

        $assoc = array("success"=>$success);
        $respuesta = json_encode($assoc);
        return $respuesta;
    }

    public function shutdown(Request $request)
    {
        /*recibe 
            ::auth?%d
        */
        $auth = $request->auth;

        /*respuesta 
            ::success?%b
        */
        $success = true;

        $assoc = array("success"=>$success);
        $respuesta = json_encode($assoc);
        return $respuesta;
    }
}
