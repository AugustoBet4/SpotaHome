<?php

namespace App\Http\Controllers;

use App\Valoracion_Inquilino_Propiedad;
use Illuminate\Http\Request;

class ValoracionPropiedadController extends Controller
{
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

    public function store(Request $request)
    {

        $this->validate($request,['comentario' => 'required',
                                  'puntuacion' => 'required']);
        Valoracion_Inquilino_Propiedad::create($request->all());
        
        return redirect()->route('historial')->with('success','Comentario registrada');
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
        return view('inquilino.index',compact('propiedades'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $valoraciones=Valoracion_Inquilino_Propiedad::find($id);
        return view('inquilino.edit',compact('valoraciones'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,['puntuacion' => 'required','comentario' => 'required']);
        Valoracion_Inquilino_Propiedad::find($id)->update($request->all());
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
        Valoracion_Inquilino_Propiedad::find($id)->delete();
        return redirect()->route('reservas')->with('success','Registro eliminado logicamente');
    }
}
