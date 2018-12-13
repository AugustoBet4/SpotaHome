<?php

namespace App\Http\Controllers;

use App\Empleado;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;
use Illuminate\Http\Request as HttpRequest;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class AgendaHomecheckersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth:empleado');
    }
    public function index()
    {
        $user = Auth::user();
        $hoy = Carbon::now()->format('Y-m-d');
        $empleados = DB::table('verificacion_propiedad')
            ->join('empleado','verificacion_propiedad.id_empleado','=','empleado.id_empleado')
            ->join('propiedad','verificacion_propiedad.id_propiedad','=','propiedad.id_propiedad')
            ->where('empleado.id_empleado','=',$user->id_empleado)
            ->where('verificacion_propiedad.fecha','>=',$hoy)
            ->where('verificacion_propiedad.estado','=','No verificado')
            ->select('verificacion_propiedad.id_verificacion_propiedad','verificacion_propiedad.estado','verificacion_propiedad.fecha','verificacion_propiedad.hora','verificacion_propiedad.observaciones','empleado.nombre','propiedad.direccion','verificacion_propiedad.id_propiedad')
            ->orderBy('verificacion_propiedad.fecha','ASC')
            ->paginate(5);

        return view ('empleados.propiedad.agenda_personal',compact('empleados'));
    }
}

