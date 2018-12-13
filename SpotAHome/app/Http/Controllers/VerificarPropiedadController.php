<?php

namespace App\Http\Controllers;
use App\Alquiler;
use App\Empleado;
use App\Multimedia;
use App\Verificacion_Propiedad;
use Illuminate\Http\Request;
use App\Propiedad;
use Auth;
use App\Fecha_Disponible;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\PropiedadRequest;
use JsValidator;

class VerificarPropiedadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth:dueno');
    }


    public function index()
    {
        $user = Auth::user();
        $nemp = DB::table('empleado')->count();
        $empleado = rand(1, $nemp);
        $propiedades = Propiedad::where('id_dueno', $user->id_dueno)->whereNull('deleted_at')->orderBy('direccion','ASC')->paginate(10);
        return view('duenos.propiedad', compact('propiedades', 'user','empleado'));
    }
    public function edit($id)
    {
        $nemp = DB::table('empleado')->count();
        $empleado = rand(1, $nemp);
        $propiedades = Propiedad::find($id);
        $fechas = Fecha_Disponible::where('id_propiedad','=',$id)->get()->first();
        return view('duenos.editverificacion', compact('propiedades', 'empleado'));
    }
    public function update(Request $request, $id)
    {
     //   $this->validate($request,['estado' => 'required','fecha' => 'required','hora' => 'required','observaciones' => 'required','id_empleado' => 'required','id_propiedad' => 'required']);
        //$this->validate($request,['fecha_inicio' => 'required','fecha_fin' => 'required']);
      //  Verificacion_Propiedad::find($id)->update($request->all());
        // Fecha_Disponible::where('id_propiedad','=',$id);

        return redirect()->route('propiedad.index')->with('success','Propiedad actualizada');
    }
    public function create(){
        $user = Auth::user();
        $nemp = DB::table('empleado')->count();
        $empleado = rand(1, $nemp);
        $propiedades = DB::table('propiedad')
            ->join('dueno','propiedad.id_dueno','=','dueno.id_dueno')
            ->where('propiedad.id_dueno','=',$user->id_dueno)
            ->get();
        return view('duenos.editverificacion', compact('user','propiedades','empleado'));
    }
    public function store(PropiedadRequest $request)
    {
        $this->validate($request,['estado' => 'required','fecha' => 'required','hora' => 'required','observaciones' => 'required','id_empleado' => 'required','id_propiedad' => 'required']);
        Verificacion_Propiedad::create($request->all());
        return redirect()->view('duenos.propiedad')->with('info', 'Verificacion ready');
    }
    public  function show($id){

        $propiedad = Propiedad::find($id);
        $fechas = Fecha_Disponible::where('id_propiedad','=',$id)->get()->first();
        $multimedia = Multimedia::where('id_propiedad','=',$id)->get()->first();
        return view('duenos.showpropiedad', compact('propiedad', 'fechas', 'multimedia'));
    }
    public function destroy($id){
        $propiedad = Propiedad::find($id);
        $propiedad->delete();
        return back();

    }
}

