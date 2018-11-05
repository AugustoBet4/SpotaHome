<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Empleado;

class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $empleado=Empleado::orderBy('id_empleado','ASC')->paginate(3);
      return view('empleado.index',compact('empleado'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('empleado.create');
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
       $this->validate($request,[ 'nombre'=>'required', 'email'=>'required', 'telefono'=>'required', 'usuario'=>'required', 'contraseña'=>'required']);
       Empleado::create($request->all());
       return redirect()->route('empleado.index')->with('success','Registro creado satisfactoriamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_empleado)
    {
      $empleado=Empleado::find($id_empleado);
      return view('empleado.mostrar',compact('empleado'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_empleado)
    {
        //
        $empleado=Empleado::find($id_empleado);
        return view('empleado.edit',compact('empleado'));
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
        $this->validate($request,[ 'nombre'=>'required', 'email'=>'required', 'telefono'=>'required', 'usuario'=>'required', 'contraseña'=>'required']);

        Empleado::find($id)->update($request->all());
        return redirect()->route('empleado.index')->with('success','Registro actualizado satisfactoriamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_empleado)
    {
        //
        Empleado::find($id_empleado)->delete();
        return redirect()->route('empleado.index')->with('success','Registro eliminado satisfactoriamente');
    }
}
