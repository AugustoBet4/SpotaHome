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
    public function store()
    {
       /* $dueno = new Dueno;
        $dueno->nombre = $request->nombre;
        $dueno->genero = $request->genero;
        $dueno->nacionalidad = $request->nacionalidad;
        $dueno->fecha_nacimiento = $request->fecha_nacimiento;
        $dueno->email = $request->email;
        $dueno->telefono = $request->telefono;
        $dueno->usuario = '';
        $dueno->contrasena ='';
        $dueno->save();
        return redirect()->route('duenos.index')->with('info', 'Dueno Registrado');*/
       return 'guardado';

    }



}
