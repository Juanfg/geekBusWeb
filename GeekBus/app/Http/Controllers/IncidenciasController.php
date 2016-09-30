<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Incidencia;
use DB;

class IncidenciasController extends Controller
{
    public function index(){
    	return view('incidencias.index', ['incidencias'=>Incidencia::all()]);
    }

    public function show($id){
    	$incidencia = Incidencia::where('idIncidencia' , $id)->firstOrFail();
    	return view('incidencias.show', ['incidencia'=>$incidencia]);
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

	public function destroyAll(Request $request, $id){

 		$incidencia = Incidencia::where('idIncidencia' , $id)->firstOrFail();
        $ids = DB::table('Incidencias')->join('Eventos','Eventos.idEvento', 'Incidencias.idEvento')->where('conductor', 1)->where('idTipoEvento', $incidencia->evento->idTipoEvento)->select('idIncidencia as id')->get();

        $deleted = true;

        foreach ($ids as $id)
            $deleted = $deleted && Incidencia::find($id->id)->delete();

        if($deleted){
            $request->session()->flash("deleted", "Eliminadas con &eacute;xito");
        }
        else{
            $request->session()->flash("failDeleted", "Algo sali&oacute; mal. Por favor contacta a desarrollo.");
        }

        return redirect()->route("incidencias.index");   
    }

}
