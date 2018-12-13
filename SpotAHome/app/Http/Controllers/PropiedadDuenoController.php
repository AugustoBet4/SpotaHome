<?php

namespace App\Http\Controllers;
use App\Alquiler;
use App\Multimedia;
use Illuminate\Http\Request;
use App\Dueno;
use App\Propiedad;
use Auth;
use App\Inquilino;
use App\Fecha_Disponible;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\PropiedadRequest;
use Illuminate\Support\Facades\Input;
use PhpParser\Node\Expr\AssignOp\Mul;
use JsValidator;


class PropiedadDuenoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:dueno');
    }


    public function index()
    {
        $user = Auth::user();
        $propiedades = Propiedad::where('id_dueno', $user->id_dueno)->whereNull('deleted_at')->orderBy('direccion','ASC')->paginate(10);
        return view('duenos/propiedad', compact('propiedades', 'user'));
    }
    public function edit($id)
    {
        $propiedades = Propiedad::find($id);

        $fechas = Fecha_Disponible::where('id_propiedad','=',$id)->get()->first();

        return view('duenos.editpropiedad', compact('propiedades', 'fechas'));
        /*$user = Auth::user();
        $propiedades = Propiedad::where('id_dueno', $user->id_dueno)->whereNull('deleted_at')->paginate(10);
        return view('duenos/propiedad', compact('propiedades', 'user'));*/
        //return 'holo';
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,['direccion' => 'required','ciudad' => 'required','latitud' => 'required','longitud' => 'required','costo' => 'required','descripcion' => 'required','zona' => 'required']);
        //$this->validate($request,['fecha_inicio' => 'required','fecha_fin' => 'required']);
        Propiedad::find($id)->update($request->all());
       // Fecha_Disponible::where('id_propiedad','=',$id);

        return redirect()->route('propiedad.index')->with('success','Propiedad actualizada');
    }
    public function create(){
        $user = Auth::user();

        return view('duenos.crearpropiedad', compact('user'));
    }
    public function store(PropiedadRequest $request)
    {

        //dd($request->all());
        $propiedad = new Propiedad;
        $fechas = new Fecha_Disponible;
        $multimedia = new Multimedia;
        $propiedad ->direccion = $request->input('direccion');
        $propiedad ->ciudad = $request->input('ciudad');
        $propiedad ->latitud = $request->input('latitud');
        $propiedad ->longitud = $request->input('longitud');
        $propiedad ->id_dueno = $request->input('id_dueno');
        $propiedad ->descripcion = $request->input('descripcion');
        $propiedad ->zona = $request->input('zona');
        $propiedad ->costo = $request->input('costo');
        $propiedad->estadia_max= $request->input('estadia_max');
        $propiedad ->save();
        $fechas->fecha_inicio = $request->input('fecha_inicio');
        $fechas->fecha_fin = $request->input('fecha_fin');
        $fechas->id_propiedad = $propiedad->id_propiedad;
        $fechas->save();
        $image = $request->file('imagen');
        $image->move('uploads', $image->getClientOriginalName());
        $multimedia->uri = $image->getClientOriginalName();
        $video = $request->input('youtube');
        if($request->input('youtube') != null){
            $video = preg_replace("#.*youtube\.com/watch\?v=#" , "", $video);
            $videolegal= "https://www.youtube.com/embed/$video";
            $multimedia->youtube = $videolegal;
        }else{
            $multimedia->youtube = $video;
        }
        $multimedia->id_propiedad = $propiedad->id_propiedad;
        $multimedia->save();
        return redirect()->route('propiedad.index')->with('info', 'Casa Registrada');

        //dd($request->all());
       //return 'Store';

    }
    public function fecha($id){

        $propiedades = Propiedad::find($id);

        $fechas = Fecha_Disponible::where('id_propiedad','=',$id)->get()->first();
        return view('duenos.editfechas', compact('propiedades', 'fechas'));

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
