<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Parada;

class ParadaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('paradas.index', ['paradas'=>Parada::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('paradas.create');
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
            "lat" => "required|numeric",
            "long" => "required|numeric",
        ]);

        $alreadyExists = Parada::where("nombre",$request->nombre)->count();

        if($alreadyExists == 0){
            //no existe
            Parada::create(["nombre"=>$request->nombre, "lat"=>$request->lat, "long"=>$request->long]);
        }else{
            //existe
            $request->session()->flash("error", "Ya existe la parada");
            return back()->withInput();
        }

        $request->session()->flash("message", "Parada creada con exito");
        return redirect()->route("paradas.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $parada = Parada::where('idParada', $id)->firstOrFail();
        return view('paradas.show', ['parada' => $parada]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $parada = Parada::where("idParada",$id)->firstorfail();
        return view("paradas.editar",["parada"=>$parada]);
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
            "lat" => "required|numeric",
            "long" => "required|numeric",
        ]);

        $parada = Parada::where("idParada",$id)->firstorfail();

        $parada->update($request->all());

        $request->session()->flash("message", "Parada actualizada con exito");
        return redirect()->route("paradas.show",[$id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $parada = Parada::where('idParada' , $id)->firstOrFail();
        $deleted = $parada->delete();

        if($deleted){
            $request->session()->flash("deleted", "Eliminada con &eacute;xito");
        }
        else{
            $request->session()->flash("failDeleted", "Algo sali&oacute; mal. Por favor contacta a desarrollo.");
        }

        return redirect()->route("paradas.index");
    }
}
