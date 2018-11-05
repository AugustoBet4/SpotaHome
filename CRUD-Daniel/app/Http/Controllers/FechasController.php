<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Fecha_Disponible;

class FechasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $fechas=Fecha_Disponible::orderBy('id_fecha_disponible','ASC')->paginate(10);
        return view('fechas.inicio',compact('fechas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('fechas.crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[ 'fecha_inicio'=>'required|date|date_format:Y-m-d|after:yesterday',
                                   'fecha_fin'=>'required|date_format:Y-m-d|after:fecha_inicio',
                                   'id_propiedades'=>'required']);
        Fecha_Disponible::create($request->all());
        return redirect()->route('fechas.index')->with('success','Registro creado satisfactoriamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $fechas=Fecha_Disponible::find($id);
        return view('fechas.mostrar',compact('fechas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $fechas=Fecha_Disponible::find($id);
        return view('fechas.editar', compact('fechas'));
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
        $this->validate($request,[ 'fecha_inicio'=>'required|date|date_format:Y-m-d|after:yesterday', 'fecha_fin'=>'required|date_format:Y-m-d|after:fecha_inicio']);
        Fecha_Disponible::find($id)->update($request->all());
        return redirect()->route('fechas.index')->with('success','Registro actualizado satisfactoriamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Fecha_Disponible::find($id)->delete();
        return redirect()->route('fechas.index')->with('success','Registro eliminado satisfactoriamente');
    }
}
