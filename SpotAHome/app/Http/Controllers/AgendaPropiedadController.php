<?php

namespace App\Http\Controllers;

use App\Empleado;
use App\Propiedad;
use App\Fecha_Disponible;
use App\Multimedia;
use App\Verificacion_Propiedad;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;
use Illuminate\Http\Request as HttpRequest;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class AgendaPropiedadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth:empleado');
    }
    public function index($id)
    {
        $user = Auth::user();
        $propiedad = DB::table('verificacion_propiedad')
            ->join('propiedad','propiedad.id_propiedad','=','verificacion_propiedad.id_propiedad')
            ->join('multimedia','multimedia.id_propiedad','=','verificacion_propiedad.id_propiedad')
            ->where('verificacion_propiedad.id_verificacion_propiedad','=',$id)
            ->select('propiedad.id_propiedad','propiedad.direccion','propiedad.zona','propiedad.ciudad','multimedia.uri','multimedia.youtube','verificacion_propiedad.id_verificacion_propiedad','verificacion_propiedad.fecha','verificacion_propiedad.hora','verificacion_propiedad.estado')
            ->first();
        return view('empleados.propiedad.hc_propiedad', compact('propiedad'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function store(HttpRequest $request)
    {
        $this->validate($request,['estado' => 'required']);
        Verificacion_Propiedad::create($request->all());
        return redirect()->action('EmpleadoController@index')->with('success','Propiedad registrada');
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
        $propiedad = Propiedad::find($id);
        $fechas = Fecha_Disponible::where('id_propiedad','=',$id)->get()->first();
        $multimedia = Multimedia::where('id_propiedad','=',$id)->get()->first();
        return view('empleados.propiedad.hc_propiedad', compact('propiedad', 'fechas', 'multimedia'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $empleados=Empleado::find($id);
        /*
        $empleados = DB::table('empleado')
            ->select('id_empleado','nombre', 'apellidos','email','telefono','usuario','contrasena')
            ->get();
*/
        return view('empleados.propiedad.edit_empleado',compact('empleados'));
    }

    public function update(HttpRequest $request, $id)
    {
        $estado = request::input('estado');
        $up = Verificacion_Propiedad::find($id);
        $up->estado = $estado;
        $up->save();
        return redirect()->view('empleados.propiedad.agenda')->with('success','Propiedad actualizada');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Empleado::find($id)->delete();
        return redirect()->route('empleado.index')->with('success','Registro eliminado logicamente');
    }
    public function actualizar(HttpRequest $request, $id)
    {
        $estado = request::input('estado');
        $up = Verificacion_Propiedad::find($id);
        $up->estado = $estado;
        $up->save();
        return redirect()->view('empleados.propiedad.agenda_propiedad')->with('success','Propiedad actualizada');
    }

}

