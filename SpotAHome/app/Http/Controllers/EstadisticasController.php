<?php

namespace App\Http\Controllers;

use App\Propiedad;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;
use Illuminate\Http\Request as HttpRequest;

class EstadisticasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Reportitos
        //Porcentaje props
        $totprop = DB::table('alquiler')->count();
        $reser = DB::table('alquiler')
            ->where('status_alquiler','=','Reservado')
        ->select('id_alquiler')
        ->count();
        $reservadas = ($reser * 100)/$totprop;
        //Fin porcentaje props
        //tabla props
        $propiedades = DB::table('propiedad')
            ->join('dueno','dueno.id_dueno','=','propiedad.id_dueno')
            ->join('alquiler','alquiler.id_propiedad','=','propiedad.id_propiedad')
            ->join('inquilino','inquilino.id_inquilino','=','alquiler.id_inquilino')
            ->join('fecha_disponibilidad','fecha_disponibilidad.id_propiedad','=','propiedad.id_propiedad')
            ->where('alquiler.status_alquiler','=','Reservado')
            ->select('dueno.nombre','inquilino.nombre as inqui','propiedad.direccion','propiedad.ciudad','propiedad.zona','propiedad.estadia_max','fecha_disponibilidad.fecha_inicio','fecha_disponibilidad.fecha_fin')
            ->get();
        //fin tabla props
        $totin = DB::table('inquilino')->count();
        $ingenero = DB::table('inquilino')
            ->where('genero','=','M')
            ->select('id_inquilino')
            ->count();
        $malein = ($ingenero * 100)/$totin;
        $femalein = 100 - $malein;

        $totdue = DB::table('dueno')->count();
        $duegenero = DB::table('dueno')
            ->where('genero','=','M')
            ->select('id_dueno')
            ->count();
        $maledue = ($duegenero * 100)/$totdue;
        $femaledue = 100 - $maledue;


        return view ('empleados.propiedad.estadisticas', compact('reservadas','propiedades','malein','femalein','totprop','totin','totdue','maledue','femaledue'));
    }
}

