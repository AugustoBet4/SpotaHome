<?php

namespace App\Http\Controllers;

use App\Propiedad;
use Illuminate\Http\Request;

class PropiedadEmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $propiedades = Propiedad::orderBy('id_propiedad','DESC')->paginate(10);
        return view ('empleados.propiedad',compact('propiedades'));
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
        $duenos = DB::table('propiedad')
            ->join('dueno','propiedad.id_dueno','dueno.id_dueno')
            ->select('nombre')
            ->get();
        $dueno = Post::whereHas('id_duenos',function ($q){
            $q->where('id_duenos','=','id_duenos');
            $q->select('nombre');
        })->get();
        return view('empleados.show',compact('propiedades'));
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
        return view('empleados.edit',compact('propiedades'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,['direccion' => 'required','ciudad' => 'required','latitud' => 'required','longitud' => 'required','id_dueno' => 'required','descripcion' => 'required','costo' => 'required']);
        Propiedad::find($id)->update($request->all());
        return redirect()->route('propiedad.index')->with('success','Propiedad actualizada');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Propiedad::find($id)->delete();
        return redirect()->route('propiedad.index')->with('success','Registro eliminado logicamente');
    }
}
