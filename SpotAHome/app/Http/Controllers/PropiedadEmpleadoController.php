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
        $duenos = DB::table('dueno')
            ->select('dueno.id_dueno','dueno.nombre')
            ->get();
        $propiedades = DB::table('propiedad')
            ->join('dueno','propiedad.id_dueno','=','dueno.id_dueno')
            ->join('alquiler','alquiler.id_propiedad','=','propiedad.id_propiedad')
            ->select('propiedad.id_propiedad','propiedad.direccion','propiedad.ciudad','propiedad.zona','dueno.nombre','propiedad.descripcion','propiedad.costo','alquiler.status_alquiler')
            ->orderBy('id_propiedad','ASC')
            ->paginate(10);
        $ciudades = DB::table('propiedad')
            ->select('propiedad.ciudad','propiedad.id_propiedad')
            ->get();
        $zonas = DB::table('propiedad')
            ->select('propiedad.zona','propiedad.id_propiedad')
            ->get();
        $estados = DB::table('alquiler')
            ->select('alquiler.status_alquiler','alquiler.id_propiedad','alquiler.id_alquiler')
            ->get();

        return view ('empleados.propiedad.index',compact('propiedades','duenos','ciudades','zonas','estados'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $duenos = DB::table('dueno')
            ->select('dueno.id_dueno','dueno.nombre')
            ->get();
        return view('empleados.propiedad.create', compact('duenos'));
    }

    public function store(Request $request)
    {
        $this->validate($request,['direccion' => 'required','ciudad' => 'required','latitud' => 'required','longitud' => 'required','id_dueno' => 'required','descripcion' => 'required','costo' => 'required','zona' => 'required']);
        Propiedad::create($request->all());
        return redirect()->route('empleados.propiedad.index')->with('success','Propiedad registrada');
       // return redirect()->url('empleados/propiedad/index')->with('success','Propiedad registrada');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //$propiedades=Propiedad::find($id);
        /*
        $duenos = DB::table('dueno')
            ->select('dueno.nombre')
            ->get();
        */
        //return view('empleados.show',compact('propiedades'));
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
            ->where('propiedad.id_propiedad','=',$id)
            ->select('dueno.id_dueno','dueno.nombre')
            ->get();

        return view('empleados.propiedad.edit',compact('propiedades', 'duenos','selected'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,['direccion' => 'required','ciudad' => 'required','latitud' => 'required','longitud' => 'required','id_dueno' => 'required','descripcion' => 'required','costo' => 'required']);
        Propiedad::find($id)->update($request->all());
        return redirect()->route('empleados.propiedad.index')->with('success','Propiedad actualizada');
        //return redirect()->route('empleados/propiedad/index')->with('success','Propiedad actualizada');
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
        return redirect()->route('empleados.propiedad.index')->with('success','Registro eliminado logicamente');
    }
    public function busqueda(Request $request)
    {
        $ciudad = request::select('ciudad');
        $costo = request::input('costo');
        $zona = request::select('zona');
        $estado = request::select('estado');
        //  $propiedad = Propiedad::where('ciudad', '=', $ciudad)->where('costo', '=', $min)->where('costo', '=', $max)->orderBy('id_propiedad', 'ASC')->paginate(10);
        $propiedades = DB::table('propiedad')
            ->join('alquiler','alquiler.id_propiedad','=','propiedad.id_propiedad')
            ->where('propiedad.ciudad', '=', $ciudad)
            ->orWhere('propiedad.costo', '=', $costo)
            ->orWhere('propiedad.zona', '<=', $zona)
            ->orWhere('alquiler.status_alquiler', '<=', $estado)
            ->select('propiedad.direccion','propiedad.ciudad','propiedad.zona','propiedad.dueno','propiedad.descripcion','propiedad.costo','alquiler.status_alquiler')
            ->get();


        return view('empleados.propiedad.busqueda', compact( 'propiedades'));
    }

}

