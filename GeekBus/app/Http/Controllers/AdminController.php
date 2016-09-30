<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.index', ['admin'=>User::all()]);
    }

    public function destroy(Request $request, $id)
    {
        $number = User::all()->count();

        if($number<2){
            $request->session()->flash("failDeleted", "Muy pocos usuarios, no es posible eliminar");
            return redirect()->route("admins.index");
        }

        $userToEliminate = User::where("id",$id)->firstorfail();
        $deleted = $userToEliminate->delete();

        if($deleted){
            $request->session()->flash("deleted","Eliminado con &eacute;xito");
        }
        else{
            $request->session()->flash("failDeleted", "Algo sali&oacute; mal. Por favor contacta a desarrador.");
        }

        return redirect()->route("admins.index");
    }
}
