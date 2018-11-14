<?php

namespace App\Http\Controllers;

use App\Alquiler;
use App\Dueno;
use App\Empleado;
use App\Propiedad;
use App\Valoracion_Inquilino_Propiedad;
use Illuminate\Support\Facades\Auth;
use Request;

class SesionEmpleadoController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:empleado');
    }

    public function index()
    {
        $user = Auth::user();
        return view('empleados/index', compact('user'));
    }



}
