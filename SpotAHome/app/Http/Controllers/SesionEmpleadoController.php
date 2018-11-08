<?php

namespace App\Http\Controllers;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate;
use Empleado;
use Auth;

class SesionEmpleadoController extends Controller
{
    /*
    public function __construct()
    {
        $this->middleware('guest',['only' => 'showLoginForm']);
    }

*/
    public function login(Request $request)
    {

        $usuarioInput = $request->input('usuario');
        $contrasenaInput = $request->input('contrasena');

        if('aicentellas' == $usuarioInput && '000' == $contrasenaInput){
            return 'ingreso exitoso';
        }
        return redirect()->route('dashboard');
    }
/*
        if(Auth::attempt(['usuario','contrasena']))
        {
            return redirect()->route('dashboard');
        }
        return back()
            ->withErrors(['usuario' => trans('auth.failed')])
            ->withInput(request(['usuario']));
    }
    public function showLoginForm(){
        return view('empleados.sesion');
    }
    public function logout(){
        Auth::logout();
        return redirect('/empleados');
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
