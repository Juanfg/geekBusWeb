<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Carbon\Carbon;
use Validator;
use App\Conductor;
use App\Ruta;
use App\Ronda;
use App\Camion;
use App\Ubicacion;

class RaspBerry extends Controller
{
    public function login(Request $request)
    {    
        $success = false;
        $auth = -1;
        $message = "";
        
        // No es un ciclo real. Solo buscamos tener forma de controlar la validacion
        //Vamos a poner Breaks por todos lados! (Lopez R. {aka. Baxter}, 2016).
        do {
             $validator = Validator::make($request->all(), [
                "conductorKey" => "required|string",
                "camionKey" => "required|string",
            ]);
      
            if ($validator->fails()){
                 $message = "Invalid request";
                 break;
            }
            
            $conductorKey = $request-> conductorKey;
            $camionKey = $request-> camionKey;
            
            $conductor = Conductor::where("loginkey", $conductorKey)->first();
            $camion = Camion::where("macAddress", $camionKey)->first();

            if($conductor == null || $camion == null){
                $message = "Invalid parameter " . $conductor;
                break;
            }
            
            $loggedCount = Ronda::where('idConductor', $conductor->idConductor)->where("salida", null)->count();
            if($loggedCount != 0){
                $message = "Already logged.";
                break;
            }
            
            // Cerramos la sesion si hubiera una abierta
            Ronda::where('idCamion', $camion->idCamion)->where("salida", null)->update(['salida' => Carbon::now()]);
            
            // Abrimos la sesion nueva
            $ronda = Ronda::create(['idConductor'=>$conductor->idConductor, 'idCamion'=>$camion->idCamion,'entrada'=>Carbon::now()]);
            if($ronda == null){
                $message = "Unknown error :c Please contact development";
                break;
            }
            
            $success = true;
            $auth = $conductor->idConductor;
            
        } while (false);
             
        $assoc = array("success"=>$success,"auth"=>$auth, "message" => $message);
        $respuesta = json_encode($assoc);
        return $respuesta;
    }

    public function update(Request $request)
    {
       $success = false;
       $message = "";
       
       
       do{
           $validator = Validator::make($request->all(), [
               "auth" => "required|integer",
                "rpm" => "required|integer",
                "pasajeros" => "required|integer",
                "velocidad" => "required|integer",
                "lat" => "required|numeric",
                "long" => "required|numeric",
                "temp" => "required|numeric",
           ]);
      
           if ($validator->fails()){
               $message = "Invalid request";
               break;
           }
           
            $auth = $request->auth;
            $rpm = $request->rpm;
            $pasajeros = $request->pasajeros;
            $velocidad = $request->velocidad;
            $lat = $request->lat;
            $long = $request->long;
            $temp = $request->temp;
            
            $rondaAbierta = Ronda::where('idConductor', $auth)->where("salida", null)->first();
            
            if($rondaAbierta == null){
                $message = "Not logged";
                break;
            }
            
            Ubicacion::create(['idCamion'=>$rondaAbierta->idCamion, 'fechahora'=>Carbon::now(), 'lat'=>$lat, 'long'=>$long]);
            
            $success = true;
            
       }while(false);

        $assoc = array("success"=>$success, "message"=>$message);
        $respuesta = json_encode($assoc);
        return $respuesta;
    }

    public function shutdown(Request $request)
    {
     
        $success = false;
        $message = "";      
      
        do{
            $validator = Validator::make($request->all(), [
                "auth" => "required|integer",
            ]);
            
            if ($validator->fails()){
                 $message = "Invalid request";
                 break;
            }
            
            $auth = $request->auth;
            
            $rondaAbierta = Ronda::where('idConductor', $auth)->where("salida", null)->update(['salida' => Carbon::now()]);
            $success = $rondaAbierta != 0;
            
            if(!$success)
                $message = "Not logged";
            
        }while(false);
      
        $assoc = array("success"=>$success, "message"=>$message);
        $respuesta = json_encode($assoc);
        return $respuesta;
    }
}