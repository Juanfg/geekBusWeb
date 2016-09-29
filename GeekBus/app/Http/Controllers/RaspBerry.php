<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Conductor;
use App\Ruta;

class RaspBerry extends Controller
{
    public function login(Request $request)
    {
        /*recibe 
            ::chofer?%s
            ::idRuta?%s
        */

        $this->validate($request,[
            "chofer" => "required|string",
            "idRuta" => "required|string",
        ]);            
        $chofer = $request->chofer;
        $ruta = $request->idRuta;

        /*repuesta 
            ::success?%b
            ::auth?%d
        */

        $conductor = Conductor::where("loginkey",$chofer);
        if($conductor==null){
            $success = false;
            $auth = null;
        }else{
            
            $success = true;
        }
        
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

        $this->validate($request,[
            "auth" => "required|numeric",
            "rpm" => "required|numeric",
            "pasajeros" => "required|numeric",
            "velocidad" "required|numeric",
            "lat" => "required|numeric",
            "long" => "required|numeric",
        ]); 

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

        $this->validate($request,[
            "auth" => "required|string",
        ]);
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
