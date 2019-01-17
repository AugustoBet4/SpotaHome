<?php

namespace App\Http\Controllers;

use App\Empleado;
use App\Verificacion_Propiedad;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;
use Illuminate\Http\Request as HttpRequest;

class EmpleadoHomecheckersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $empleados = DB::table('verificacion_propiedad')
            ->join('empleado','verificacion_propiedad.id_empleado','=','empleado.id_empleado')
            ->join('propiedad','verificacion_propiedad.id_propiedad','=','propiedad.id_propiedad')
            ->select('verificacion_propiedad.id_verificacion_propiedad','verificacion_propiedad.estado','verificacion_propiedad.fecha','verificacion_propiedad.hora','verificacion_propiedad.observaciones','empleado.nombre','propiedad.direccion','verificacion_propiedad.id_propiedad')
            ->paginate(5);

        return view ('empleados.propiedad.agenda_homecheckers',compact('empleados'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $empleados = DB::table('empleado')
            ->select('id_empleado','nombre', 'apellidos','email','telefono','usuario')
            ->get();

        return view ('empleados.propiedad.create_empleado',compact('empleados'));
    }

    public function store(HttpRequest $request)
    {
        $this->validate($request,['nombre' => 'required','apellidos' => 'required','email' => 'required','telefono' => 'required','usuario' => 'required','contrasena' => 'required']);
        Empleado::create($request->all());
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
        $this->validate($request,['nombre' => 'required','apellidos' => 'required','email' => 'required','telefono' => 'required','usuario' => 'required','contrasena' => 'required']);
        Empleado::find($id)->update($request->all());
        return redirect()->action('EmpleadoController@index')->with('success','Propiedad actualizada');
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
        Empleado::find($id)->delete();
        return redirect()->route('empleado.index')->with('success','Registro eliminado logicamente');
    }

    public function cita(HttpRequest $request)
    {
        $id = $request['id'];
        return view('empleados.propiedad.cita', ['id'=>$id]);
    }

    public function regcita(HttpRequest $request)
    {
        $id = $request['id'];
        $fecha = $request['fecha'];
        $hora = $request['hora'];
        $obs = $request['obs'];
        $homecheck = new Verificacion_Propiedad;
        $homecheck->fecha = $fecha;
        $homecheck->estado = 'No verificado';
        $homecheck->hora = $hora;
        $homecheck->observaciones = $obs;
        $homecheck->id_propiedad = $id;
        $homecheck->id_empleado = '4';
        $homecheck->save();
        return redirect()->route('empleados.propiedad.index');
    }

}

