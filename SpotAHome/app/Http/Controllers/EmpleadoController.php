<?php

namespace App\Http\Controllers;

use App\Empleado;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;
use Illuminate\Http\Request as HttpRequest;

class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $empleados = DB::table('empleado')
            ->select('id_empleado','nombre', 'apellidos','email','telefono','usuario')
            ->paginate(5);

        return view ('empleados.propiedad.empleado',compact('empleados'));
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

}

