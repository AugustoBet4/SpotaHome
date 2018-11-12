<?php

namespace App\Http\Controllers;

use App\Propiedad;
use Illuminate\Http\Request;
use App\Alquiler;
use Illuminate\Support\Facades\Auth;

class PropiedadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $alquiler = Alquiler::orderBy('id_alquiler','ASC')->paginate(10);
        return view ('inquielino.reserva',compact('alquiler'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('empleados.create');
    }

    public function store(Request $request)
    {
        $this->validate($request,['direccion' => 'required','ciudad' => 'required','latitud' => 'required','longitud' => 'required','id_dueno' => 'required','descripcion' => 'required','costo' => 'required']);
        Propiedad::create($request->all());
        return redirect()->route('propiedad.index')->with('success','Propiedad registrada');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $propiedades=Propiedad::find($id);
        return view('inquilinos.index',compact('propiedades'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $propiedades=Propiedad::find($id);
        return view('inquilino.edit',compact('propiedades'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,['direccion' => 'required','ciudad' => 'required','latitud' => 'required','longitud' => 'required','id_dueno' => 'required','descripcion' => 'required','costo' => 'required']);
        Propiedad::find($id)->update($request->all());
        return redirect()->route('inquilino.reservas')->with('success','Reserva actualizada');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Alquiler::find($id)->delete();
        return redirect()->route('reservas')->with('success','Registro eliminado logicamente');
    }
}
