<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Ruta;
use App\Camion;

class BusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('camiones.index', ['camiones'=>Camion::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("camiones.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //ruta,unidad,asientos,capacidad,rpm,vel,mac;
        $this->validate($request,[
            "idRuta" => "required",
            "unidad" => "required|numeric",
            "asientos" => "required|numeric",
            "capacidadMaxima" => "required|numeric",
            "rpmMax" => "required|numeric",
            "velMax" => "required|numeric",
            "macAddress" => "required|string",
        ]);

        Ruta::where("idRuta",$request->idRuta)->firstorfail();

        $alreadyExists = Camion::where("unidad",$request->unidad)->count();
        if($alreadyExists == 0){
            Camion::create($request->all());
        }else{
            $request->session()->flash("error","Ya existe esta unidad registrada");
            return back()->withInput();
        }

        $request->session()->flash("message","Unidad creada y asignada con exito");
        return redirect()->route("autobuses.create");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $camion = Camion::where('idCamion',$id)->firstorfail();
        return view("camiones.show",["camion" => $camion]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $toEdit = Camion::where("idCamion",$id)->firstorfail();
        return view("camiones.edit",["camion"=>$toEdit]);
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
            "unidad" => "required|numeric",
            "asientos" => "required|numeric",
            "capacidadMaxima" => "required|numeric",
            "rpmMax" => "required|numeric",
            "velMax" => "required|numeric",
            "macAdress" => "required|string",
        ]);

        $toEdit = Camion::where("idCamion",$id)->firstorfail();

        $toEdit->update($request->all());

        $request->session()->flash("message","Unidad actualizada con exito");
        return redirect()->route("camion.show",[$id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
