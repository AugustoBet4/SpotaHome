<?php

namespace App\Http\Controllers;

use App\Propiedad;
use App\Dueno;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PropiedadEmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$propiedades = Propiedad::orderBy('id_propiedad','ASC')->paginate(10);
       // $duenos=Dueno::orderBy('id_propiedad','ASC');
        $propiedades = DB::table('propiedad')
            ->join('dueno','propiedad.id_dueno','=','dueno.id_dueno')
            ->select('propiedad.id_propiedad','propiedad.direccion','propiedad.ciudad','propiedad.zona','dueno.nombre','propiedad.descripcion','propiedad.costo')
            ->orderBy('id_propiedad','ASC')
            ->paginate(10);

        return view ('empleados.propiedad',compact('propiedades','duenos'));
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
        $duenos = DB::table('dueno')
            ->join('propiedad','propiedad.id_dueno','=',$id)
            ->select('dueno.nombre')
            ->get();
        return view('empleados.show',compact('propiedades', 'duenos'));
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

        $duenos = DB::table('dueno')
            ->select('dueno.id_dueno','dueno.nombre')
            ->get();

        $selected = DB::table('dueno')
            ->join('propiedad','propiedad.id_dueno','=','dueno.id_dueno')
            ->select('dueno.id_dueno','dueno.nombre')
            ->get();

        return view('empleados.edit',compact('propiedades', 'duenos','selected'));
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

