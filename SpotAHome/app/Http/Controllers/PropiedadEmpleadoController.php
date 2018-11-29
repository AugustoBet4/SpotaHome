<?php

namespace App\Http\Controllers;

use App\Propiedad;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;
use Illuminate\Http\Request as HttpRequest;

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
            //->join('alquiler','alquiler.id_propiedad','=','propiedad.id_propiedad')
                //,'alquiler.status_alquiler'
            ->select('propiedad.id_propiedad','propiedad.direccion','propiedad.ciudad','propiedad.zona','dueno.nombre','propiedad.descripcion','propiedad.costo','propiedad.estadia_max')
            ->orderBy('id_propiedad','ASC')
            ->paginate(10);
        //->get();
        $ciudades = DB::table('propiedad')
            ->select('propiedad.ciudad','propiedad.id_propiedad')
            ->get();
        $zonas = DB::table('propiedad')
            ->select('propiedad.zona','propiedad.id_propiedad')
            ->get();
        /*
        $estados = DB::table('alquiler')
            ->select('alquiler.status_alquiler','alquiler.id_propiedad','alquiler.id_alquiler')
            ->get();
        */

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

    public function store(HttpRequest $request)
    {
        $this->validate($request,['direccion' => 'required','ciudad' => 'required','latitud' => 'required','longitud' => 'required','id_dueno' => 'required','descripcion' => 'required','costo' => 'required','zona' => 'required','estadia_max' => 'required']);
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

    public function update(HttpRequest $request, $id)
    {
        $this->validate($request,['direccion' => 'required','ciudad' => 'required','latitud' => 'required','longitud' => 'required','id_dueno' => 'required','descripcion' => 'required','costo' => 'required','zona' => 'required','estadia_max' => 'required']);
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
    public function busqueda(HttpRequest $request)
    {
        $costo = request::input('precio');
        $ciudad = request::input('city');
        $zona = request::input('zone');
        $propiedades = DB::table('propiedad')
            ->join('dueno','propiedad.id_dueno','=','dueno.id_dueno')
            //->join('alquiler','alquiler.id_propiedad','=','propiedad.id_propiedad')
            ->orWhere('propiedad.ciudad', '=', $ciudad)
            ->orWhere('propiedad.costo', '=', $costo)
            ->orWhere('propiedad.zona', '=', $zona)
            ->select('propiedad.id_propiedad','propiedad.direccion','propiedad.ciudad','propiedad.zona','dueno.nombre','propiedad.descripcion','propiedad.costo','propiedad.estadia_max')
            ->get();


        return view('empleados.propiedad.busqueda', compact( 'propiedades','costo'));
    }
}

