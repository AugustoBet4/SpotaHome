<?php

namespace App\Http\Controllers;

use App\Alquiler;
use App\Consulta;
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
        //
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
        //
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
        //
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

        $reservas = DB::table('alquiler')
            ->join('propiedad', 'propiedad.id_propiedad', '=', 'alquiler.id_propiedad')
            ->where('propiedad.id_dueno', '=', $user->id_dueno)
            ->select('alquiler.fecha_inicio', 'alquiler.fecha_fin', 'alquiler.status_alquiler', 'propiedad.direccion', 'alquiler.id_alquiler', 'propiedad.id_dueno')
            ->orderBy('alquiler.id_alquiler', 'ASC')
            ->paginate(10);

        return view('duenos/reservas', compact('user','reservas'));

    }
}
