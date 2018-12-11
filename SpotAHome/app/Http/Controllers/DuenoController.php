<?php

namespace App\Http\Controllers;

use App\Alquiler;
use App\Consulta;
use App\Dueno;
use App\Inquilino;
use App\Propiedad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DuenoController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:dueno');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $duenos = Dueno::where('id_dueno', $user->id_dueno)->whereNull('deleted_at')->orderBy('nombre','ASC')->paginate(10);
        return view('duenos/perfil', compact('duenos', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dueno = Dueno::find($id);
        return view('duenos.edit', compact('dueno'));

        //return $dueno->nombre;
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
        $this->validate($request,['nombre' => 'required','apellidos' => 'required','genero' => 'required', 'nacionalidad' => 'required', 'fecha_nacimiento' => 'required|date_format:Y-m-d|before:yesterday', 'email' => 'required','telefono' => 'required','usuario' => 'required']);
        Dueno::find($id)->update($request->all());
        return redirect()->action('DuenoController@index')->with('success','Propiedad actualizada');
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

    public function getConsulta()
    {
        $user = Auth::user();
        $consultas = Consulta::where('id_dueno', $user->id_dueno)->orderBy('id_consultas', 'ASC')->whereNull('deleted_at')->paginate(10);
        return view('duenos/consultas', compact('user', 'consultas'));
    }

    public function consulta($id)
    {
        $user = Auth::user();
        $consulta = Consulta::find($id);
        return view('duenos/enviarConsulta', compact('user', 'consulta'));
    }
    public function reservas()
    {
        $user = Auth::user();
        $inquilino=DB::table('inquilino')->orderBy('id_inquilino','asc')
                    ->get();

        $reservas = DB::table('alquiler')
            ->join('propiedad', 'propiedad.id_propiedad', '=', 'alquiler.id_propiedad')
            ->where('propiedad.id_dueno', '=', $user->id_dueno)
            ->select('alquiler.fecha_inicio', 'alquiler.fecha_fin', 'alquiler.status_alquiler', 'propiedad.direccion', 'alquiler.id_alquiler', 'propiedad.id_dueno', 'alquiler.updated_at','alquiler.id_inquilino' )
            ->orderBy('alquiler.id_alquiler', 'ASC')
            ->paginate(10);

        return view('duenos/reservas', compact('user','reservas', 'inquilino'));

    }
    public function usuario($id){

        $user = Auth::user();
      $inquilino = Inquilino::find($id);

        return view('duenos/inquilino', compact('inquilino', 'user'));


    }
}
