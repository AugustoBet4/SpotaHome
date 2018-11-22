<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\inquilino;
use Auth;
use Illuminate\Support\Facades\Hash;

class RegistroInquilino extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $inquilino = Inquilino::orderBy('id_inquilino','ASC')->paginate(10);
      return view ('inquilino/create', compact('inquilino'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('inquilino/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $inquilino = new Inquilino;
      $inquilino->nombre = $request->input('nombre');
      $inquilino->apellidos = $request->input('apellidos');
      $inquilino->email = $request->input('email');
      $inquilino->telefono = $request->input('telefono');
      $inquilino->fecha_nacimiento = $request->input('fecha_nacimiento');
      $inquilino->genero = $request->input('genero');
      $inquilino->nacionalidad = $request->input('nacionalidad');
      $inquilino->usuario = $request->input('usuario');
      $inquilino->contraseña = Hash::make($request->input('contrasena'));
      $inquilino->save();
      return redirect()->route('welcome')->with('info', 'Inquilino Registrado');
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
}
