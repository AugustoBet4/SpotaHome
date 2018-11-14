<?php

namespace App\Http\Controllers;
use App\Alquiler;
use Illuminate\Http\Request;
use App\Dueno;
use App\Propiedad;
use Auth;
use App\Inquilino;

class PropiedadDuenoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:dueno');
    }


    public function index()
    {
        $user = Auth::user();
        $propiedades = Propiedad::where('id_dueno', $user->id_dueno)->whereNull('deleted_at')->paginate(10);
        return view('duenos/propiedad', compact('propiedades', 'user'));
        //return 'holo';
    }
    public function edit($id)
    {
        $propiedades = Propiedad::find($id);
        return view('duenos.editpropiedad', compact('propiedades'));
        /*$user = Auth::user();
        $propiedades = Propiedad::where('id_dueno', $user->id_dueno)->whereNull('deleted_at')->paginate(10);
        return view('duenos/propiedad', compact('propiedades', 'user'));*/
        //return 'holo';
    }
    public function update(Request $request, $id)
    {
        $this->validate($request,['direccion' => 'required','ciudad' => 'required','latitud' => 'required','longitud' => 'required','costo' => 'required','descripcion' => 'required','zona' => 'required']);
        Propiedad::find($id)->update($request->all());
        return redirect()->route('propiedad.index')->with('success','Propiedad actualizada');
    }

}
