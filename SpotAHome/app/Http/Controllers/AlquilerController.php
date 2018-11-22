<?php

namespace App\Http\Controllers;

use App\Propiedad;
use Illuminate\Http\Request;
use App\Alquiler;
use Illuminate\Support\Facades\Auth;

class AlquilerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $alquiler = Alquiler::orderBy('id_alquiler','ASC')->paginate(10);
        return view ('inquilino.reserva',compact('alquiler'));
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
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
      /*$this->validate($request,['status_alquiler' => 'required',
                                'fecha_inicio' => 'required|date|date_format:Y-m-d|after:yesterday',
                                'fecha_fin' => 'required|date_format:Y-m-d|after:fecha_inicio']);

      Alquiler::create($request->all());*/
      $alquiler = new Alquiler;
      $alquiler ->status_alquiler = $request->input('status_alquiler');
      $alquiler ->fecha_inicio = $request->input('fecha_inicio');
      $alquiler ->fecha_fin = $request->input('fecha_fin');
      $alquiler ->id_propiedad = $request->input('id_propiedad');
      $alquiler ->id_inquilino = $request->input('id_inquilino');
      $alquiler ->save();
      return redirect()->route('busqueda')->with('success','Reserva registrada');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {

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
        $this->validate($request,['status_alquiler' => 'required']);
        Alquiler::find($id)->update($request->all());
        return redirect()->route('reservas')->with('success','Reserva actualizada');
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
