<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Dueno;
use Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\DuenoRequest;
class DuenoEmpleadoController extends Controller
{
   /* public function __construct()
    {
        $this->middleware('auth:duenos');
    }*/


    public function index()
    {

       $duenos = Dueno::orderBy('id_dueno','ASC')->paginate(10);
        return view ('empleados.dueno',compact('duenos'));
        /*$user = Auth::user();
        //return view('duenos.index', compact('user'));
        //propiedades del dueno
        //$duenos = Dueno::orderBy('id_dueno', 'ASC')->paginate(5);
        //return view('duenos.index', compact('duenos') );
        //
        return view('empleados.dueno');*/

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
        $dueno->contrasena = Hash::make($request->input('contrasena'));
        $dueno->save();
        return redirect()->route('welcome')->with('info', 'Dueno Registrado');
       //dd($request->all());
       //return 'guardado fin';

    }
    public  function show($id){

        $dueno = Dueno::find($id);
        return view('empleados.showdueno', compact('dueno'));
    }
    public function destroy($id){
        $dueno = Dueno::find($id);
        $dueno->delete();
        return back();

    }
    public function edit ($id){
        $dueno = Dueno::find($id);
        return view('empleados.editdueno', compact('dueno'));
    }
    public function update(Request $request, $id)
    {
        $this->validate($request,['nombre' => 'required','apellidos' => 'required','genero' => 'required','nacionalidad' => 'required','fecha_nacimiento' => 'required','email' => 'required','telefono' => 'required']);
        Dueno::find($id)->update($request->all());
        return redirect()->route('duenos.index')->with('success','Due&ntilde;o actualizado');
    }



}
