<?php

namespace App\Http\Controllers;

use App\Inquilino;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;
use Illuminate\Http\Request as HttpRequest;

class InquilinoEmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * //Commit solo porque si
     */
    public function index()
    {
        $inquilinos = DB::table('inquilino')
            ->join('alquiler','alquiler.id_inquilino','=','inquilino.id_inquilino')
            ->join('propiedad','alquiler.id_propiedad','=','propiedad.id_propiedad')
            ->select('inquilino.nombre','inquilino.apellidos','propiedad.direccion','alquiler.status_alquiler','alquiler.fecha_inicio','alquiler.fecha_fin')
            ->paginate(5);
        return view ('empleados.propiedad.inquilino',compact('inquilinos'));
    }
    public function busqueda(HttpRequest $request)
    {
        $nombre = request::input('nombre');
        $apellidos = request::input('apellido');
        $estado = request::input('estado');
        $fecha = request::input('fecha');
        $inquilinos = DB::table('inquilino')
            ->join('alquiler','alquiler.id_inquilino','=','inquilino.id_inquilino')
            ->join('propiedad','alquiler.id_propiedad','=','propiedad.id_propiedad')
            ->orWhere('inquilino.nombre','=',$nombre)
            ->orWhere('inquilino.apellidos','=',$apellidos)
            ->orWhere('alquiler.status_alquiler','=',$estado)
            ->orWhere('alquiler.fecha_inicio','=',$fecha)
            ->orWhere('alquiler.fecha_fin','=',$fecha)
            ->select('inquilino.nombre','inquilino.apellidos','propiedad.direccion','alquiler.status_alquiler','alquiler.fecha_inicio','alquiler.fecha_fin')
            ->get();


        return view('empleados.propiedad.busqueda_inquilino', compact( 'inquilinos','aqui'));
    }
}

