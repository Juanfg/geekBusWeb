<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Ruta;
use App\Camion;
use App\Ubicacion;

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
        $ultimaUbicacion = Ubicacion::where("idCamion",$id)->orderby("fechahora","DESC")->first();

        return view("camiones.show",["camion" => $camion, "ubicacion" => $ultimaUbicacion]);
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
        return view("camiones.editar",["camion"=>$toEdit]);
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
            "macAddress" => "required|string",
        ]);

        $toEdit = Camion::where("idCamion",$id)->firstorfail();

        $alreadyExists = Camion::where("unidad",$request->unidad)->count();
        if($alreadyExists == 0){
            $toEdit->update($request->all());
        }
        else{
            $request->session()->flash("message","Ya existe esa unidad");
            return redirect()->route("autobuses.show",[$id]);
        }

        $request->session()->flash("message","Unidad actualizada con exito");
        return redirect()->route("autobuses.show",[$id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $bus = Camion::where("idCamion", $id)->firstorfail();
        $deleted = $bus->delete();

        if($deleted){
            $request->session()->flash("deleted","Eliminado con &eacute;xito");
        }
        else{
            $request->session()->flash("failDeleted", "Algo sali&oacute; mal. Por favor contacta a desarrollo.");
        }

        return redirect()->route("autobuses.index");
    }
}
