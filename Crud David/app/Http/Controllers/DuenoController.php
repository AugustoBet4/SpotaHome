<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dueno;
use App\Http\Requests\DuenoRequest;

class DuenoController extends Controller
{

    public function index()
    {
        $duenos = Dueno::orderBy('id_duenos','ASC')->paginate(10);
        return view('duenos.index', compact('duenos'));
    }

    public function show($id)
    {
        $dueno = Dueno::find($id);
        return view('duenos.show', compact('dueno'));
    }

    public function destroy($id){

        $dueno = Dueno::find($id);
        $dueno->delete();
        return back()->with('info','El dueno fue eliminado');


    }
    public function edit ($id)
    {
        $dueno = Dueno::find($id);
        return view('duenos.edit', compact('dueno'));
    }
    public function create()
    {
        return view('duenos.create');
    }
    public function store(DuenoRequest $request)
    {
        $dueno = new Dueno;
        $dueno->nombre = $request->nombre;
        $dueno->genero = $request->genero;
        $dueno->nacionalidad = $request->nacionalidad;
        $dueno->fecha_nacimiento = $request->fecha_nacimiento;
        $dueno->email = $request->email;
        $dueno->telefono = $request->telefono;
        $dueno->usuario = '';
        $dueno->contrasena ='';
        $dueno->save();
        return redirect()->route('duenos.index')->with('info', 'Dueno Registrado');

    }

    public function update (DuenoRequest $request, $id)
    {
        $dueno = Dueno::find($id);
        $dueno->nombre = $request->nombre;
        $dueno->genero = $request->genero;
        $dueno->nacionalidad = $request->nacionalidad;
        $dueno->fecha_nacimiento = $request->fecha_nacimiento;
        $dueno->email = $request->email;
        $dueno->telefono = $request->telefono;
        $dueno->save();
        return redirect()->route('duenos.index')->with('info', 'Dueno Actualizado');

    }


    /*public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    /*public function index()
    {
        return view('home');
    }*/
}
