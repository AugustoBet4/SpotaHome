<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Dueno;;
use App\Http\Requests\DuenoRequest;
class DuenoController extends Controller
{
    public function index()
    {
        //propiedades del dueno
        //$duenos = Dueno::orderBy('id_dueno', 'ASC')->paginate(5);
        //return view('duenos.index', compact('duenos') );
        return view('duenos.index');
    }
    public function create(){


        return view('duenos.create');
    }
    public function store(Request $request)
    {
        $dueno = new Dueno;
        $dueno->nombre = $request->input('nombre');
        $dueno->apellidos = $request->input('apellidos');
        $dueno->email = $request->input('email');
        $dueno->telefono = $request->input('telefono');
        $dueno->fecha_nacimiento = $request->input('fecha_nacimiento');
        $dueno->genero = $request->input('genero');
        $dueno->nacionalidad = $request->input('nacionalidad');
        $dueno->usuario = $request->input('usuario');
        $dueno->contrasena = $request->input('contrasena');
        $dueno->save();
        return redirect()->route('duenos.index')->with('info', 'Dueno Registrado');
       //dd($request->all());
       //return 'guardado fin';

    }



}
