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
use App\TipoEvento;
use App\Evento;
use App\Senial;
use App\Parada;

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
            $closed = Ronda::where('idCamion', $camion->idCamion)->where("salida", null)->update(['salida' => Carbon::now()]);
            
            //Si no cerramos sesion entonces generamos evento de encendido
            if($closed == 0){
                Evento::create(['idCamion'=>$camion->idCamion,'fechahora'=>Carbon::now(), 'idTipoEvento'=>TipoEvento::$encendido,'valor'=>-1, 'conductor'=>$conductor->idConductor]);

            }

            // Abrimos la sesion nueva
            $ronda = Ronda::create(['idConductor'=>$conductor->idConductor, 'idCamion'=>$camion->idCamion,'entrada'=>Carbon::now()]);
            if($ronda == null){
                $message = "Unknown error :c Please contact development";
                break;
            }
            
            // Creamos la senial que verificara que el camion siga en linea
            $senial = Senial::firstOrNew(['idCamion'=>$camion->idCamion]);
            $senial->modificadoEn = Carbon::now();
            $senial->save();

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
            
            $idCamion = $rondaAbierta->idCamion;

            Ubicacion::create(['idCamion'=>$idCamion, 'fechahora'=>Carbon::now(), 'lat'=>$lat, 'long'=>$long]);
            Evento::create(['idCamion'=>$idCamion,'fechahora'=>Carbon::now(), 'idTipoEvento'=>TipoEvento::$rpm,'valor'=>$rpm, 'conductor'=>$auth]);
            Evento::create(['idCamion'=>$idCamion,'fechahora'=>Carbon::now(), 'idTipoEvento'=>TipoEvento::$pasajeros,'valor'=>$pasajeros, 'conductor'=>$auth]);
            Evento::create(['idCamion'=>$idCamion,'fechahora'=>Carbon::now(), 'idTipoEvento'=>TipoEvento::$temperatura,'valor'=>$temp, 'conductor'=>$auth]);
            Evento::create(['idCamion'=>$idCamion,'fechahora'=>Carbon::now(), 'idTipoEvento'=>TipoEvento::$velocidad,'valor'=>$velocidad, 'conductor'=>$auth]);

            $paradas = Parada::all();
            $earthRadius = 6371000;
            $distanceTreshold = 30;
            foreach($paradas as $p)
            {
                $latFrom = deg2rad($p->lat);
                $lonFrom = deg2rad($p->long);
                $latTo = deg2rad($lat);
                $lonTo = deg2rad($long);

                $latDelta = $latTo - $latFrom;
                $lonDelta = $lonTo - $lonFrom;

                $angle = 2 * asin(sqrt(pow(sin($latDelta / 2), 2) +cos($latFrom) * cos($latTo) * pow(sin($lonDelta / 2), 2)));
                $distance = $angle * $earthRadius;
                if($distance<$distanceTreshold)
                {
                    Evento::create(['idCamion'=>$idCamion,"fechahora"=>Carbon::now(),"idTipoEvento"=>TipoEvento::$parada,"valor"=>$p->idParada]);
                }
            }
                

            //cunado un camion pasa por una parada::: tiempo, parada, camion,

            //Actualizmos la senial para que no genere evento de desconexion
            $senial = Senial::firstOrNew(['idCamion'=>$idCamion]);
            $senial->modificadoEn = Carbon::now();
            $senial->save();

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

            $rondaAbierta = Ronda::where('idConductor', $auth)->where("salida", null)->first();

            if($rondaAbierta == null){
                $message = "Not logged";
                break;
            }

            // Creamos el evento
            Evento::create(['idCamion'=>$rondaAbierta->idCamion,'fechahora'=>Carbon::now(), 'idTipoEvento'=>TipoEvento::$apagado,'valor'=>-1, 'conductor'=>$auth]);


            $senial = Senial::where(['idCamion'=>$rondaAbierta->idCamion])->first();

            if($senial != null)
                $senial->delete();

            // Cerramos la sesion abierta
            Ronda::where('idConductor', $auth)->where("salida", null)->update(['salida' => Carbon::now()]);
           
            $success = true;

        }while(false);
      
        $assoc = array("success"=>$success, "message"=>$message);
        $respuesta = json_encode($assoc);
        return $respuesta;
    }
}