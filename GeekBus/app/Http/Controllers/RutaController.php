<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Ruta;
use App\ParadaCamion;
use App\Parada;

class RutaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("rutas.index", ['rutas'=>Ruta::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("rutas.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $message = "";
        $this->validate($request,[
            "nombre" => "required|string",
            "descripcion" => "required|string",
        ]);

        $alreadyExists = Ruta::where("nombre", $request->nombre)->count();

        if($alreadyExists == 0){
            Ruta::create(["nombre"=>$request->nombre, "descripcion"=>$request->descripcion]);
        }else{
            $request->session()->flash("error", "Ya existe la ruta");
            return back()->withInput();
        }

        $request->session()->flash("message", "Ruta creada con exito");
        return redirect()->route("rutas.create");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ruta = Ruta::where('idRuta', $id)->firstOrFail();
        $paradas = DB::table('Rutas')->where('Rutas.idRuta', 2)->join('ParadaCamiones','Rutas.idRuta','ParadaCamiones.idRuta')->join('Paradas','Paradas.idParada','ParadaCamiones.idParada')->orderby('numParada')->get();
        return view('rutas.show', ['ruta' => $ruta, "paradas"=>$paradas]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ruta = Ruta::where("idRuta",$id)->firstorfail();
        return view("rutas.editar",["ruta"=>$ruta]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            "nombre" => "required|string",
            "descripcion" => "required|string",
        ]);

        $ruta = Ruta::where("idRuta",$id)->firstorfail();

        $ruta->update($request->all());

        $request->session()->flash("message", "Ruta actualizada con exito");
        return redirect()->route("rutas.show",[$id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $ruta = Ruta::where('idRuta' , $id)->firstOrFail();
        $deleted = $ruta->delete();

        if($deleted){
            $request->session()->flash("deleted", "Eliminada con &eacute;xito");
        }
        else{
            $request->session()->flash("failDeleted", "Algo sali&oacute; mal. Por favor contacta a desarrollo.");
        }

        return redirect()->route("rutas.index");
    }

    public function paradaCreate(Request $request, $id)
    {
        return 'no disponible por el momento';
        return view('route.createroute',["idRuta"=>$id]);
    }

    public function paradaStore(Request $request, $id)
    {
        Ruta::where("idRuta",$id)->findorfail();
        Parada::where("idParada",$request->idParada)->findorfail();
        $numParada = ParadaCamion::where("idParada",1)->max('numParada') +  1;

        ParadaCamion::create(["idRuta"=>$id,"idParada"=>$request->idParada,"numParada"=>$numParada]);
        

        $request->session()->flash("message","Parada asignda con exito");
        return redirect()->route("route.create");
    }
}
