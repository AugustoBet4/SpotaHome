<?php

namespace App\Http\Controllers;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Empleado;
use Auth;

class SesionEmpleadoController extends Controller
{
    public function login(){
        $this->validate(request(), [
            'user' => 'required|string',
            'pass' => 'required',
        ]);


        if(Empleado::attempt(['user','pass']))
        {
            return 'Iniciaste correctamente';
        }
        return back()
            ->withErrors(['user' => trans('auth.failed')])
            ->withInput(request(['user']));
    }


/*
    public function index()
    {
        return view('empleados/sesion');

    }
    /*
        use AuthenticatesUsers;

        public function __construct()
        {
            $this->middleware('guest')->except('logout');
        }
       /*

        public function Historial()
        {
            return view('home/minor');
        }
       */

}
