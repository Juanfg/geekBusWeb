<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Incidencia;

class IncidenciasController extends Controller
{
    public function index(){
    	return view('incidencias.index', ['incidencias'=>Incidencia::all()]);
    }

    public function show(){
    	return view('incidencias.index', []);
    }

    public function destroy(Request $request, $id){
 		$incidencia = Incidencia::where('idIncidencia' , $id)->firstOrFail();
        $deleted = $incidencia->delete();

        if($deleted){
            $request->session()->flash("deleted", "Eliminado con &eacute;xito");
        }
        else{
            $request->session()->flash("failDeleted", "Algo sali&oacute; mal. Por favor contacta a desarrollo.");
        }

        return redirect()->route("incidencias.index");   
    }
}
