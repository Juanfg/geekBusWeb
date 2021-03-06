<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Conductor;

class ChoferController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('conductores.index', ['conductores'=>Conductor::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('conductores.create');
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
            "loginKey" => "required|string",
            "image" => "required|image",
        ]);

        $path = $request->image->store('public');

        $alreadyExists = Conductor::where("loginKey",$request->loginKey)->count();

        if($alreadyExists == 0){
            //no existe
            Conductor::create(["nombre"=>$request->nombre, "loginKey"=>$request->loginKey, "fotoPath"=>$path]);
        }else{
            //existe
            $request->session()->flash('error', "La llave ya esta en uso. Es muy importante que sea &uacute;nica");
            return back()->withInput();
        }

        $request->session()->flash("message", "Creado con exito");
        return redirect()->route("choferes.create");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $conductor = Conductor::where('idConductor', $id)->firstOrFail();
        return view('conductores.show', ['conductor' => $conductor]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $conductor = Conductor::where('idConductor', $id)->firstOrFail();
        return view('conductores.editar', ['conductor' => $conductor]);
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
        do{

            $conductor = Conductor::where('idConductor' , $id)->firstOrFail();

            $this->validate($request,[
                "nombre" => "required|string",
                "loginKey" => "required|string",
                "image" => "image",
            ]);

            $updating = $request->all();

            if ($request->hasFile('image')){
                $updating['fotoPath'] = $request->image->store("public");
            }
            
            $alreadyExists = Conductor::where("loginKey",$request->loginKey)->where('idConductor', '<>' ,$id)->count();

            if($alreadyExists == 0){
                //no existe
                $conductor->update($updating);
            }else{
                //existe
                $request->session()->flash('error', "La llave ya esta en uso por otro usuario. Es muy importante que sea &uacute;nica");
                return back()->withInput();
            }

        }while(false);

        $request->session()->flash("message", "Actualizado con exito");
        return redirect()->route("choferes.show", [$id]);    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
            $conductor = Conductor::where('idConductor' , $id)->firstOrFail();
            $deleted = $conductor->delete();

            if($deleted){
               $request->session()->flash("deleted", "Eliminado con &eacute;xito");
            }
            else{
                $request->session()->flash("failDeleted", "Algo sali&oacute; mal. Por favor contacta a desarrollo.");
            }

            return redirect()->route("choferes.index");
    }
}
