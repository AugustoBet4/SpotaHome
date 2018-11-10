<?php

namespace App\Http\Controllers\AuthInquilino;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = 'inquilino/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:inquilino');
    }

    /**
     * Show the application's login form
     * 
     * @return \Illuminate\Http\Response
    */
    public function showLoginForm()
    {
        return view('inquilino.sesion');
    }

    /**
     * Get the guard to be used during authentication.
     * 
     * @return \Illuminate\Contracts\Auth\StatefulGuard
    */
    protected function guard()
    {
        return Auth::guard('inquilino');
    }

    /**
     * Log the user out of the application 
     * 
     * @param \Illuminate\Http\Response    $request
     * @return \Illuminate\Http\Response
    */
    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->flush();

        $request->session()->regenerate();

        return redirect('/');
    }

}
