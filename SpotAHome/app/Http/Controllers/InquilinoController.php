<?php

namespace App\Http\Controllers;

use App\Alquiler;
use App\Consulta;
use App\Dueno;
use App\Inquilino;
use App\Propiedad;
use App\Valoracion_Inquilino_Propiedad;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
Use DB;
use App\Multimedia;
use Illuminate\Validation\Rules\In;


class InquilinoController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:inquilino');
    }

    public function index()
    {
        $user = Auth::user();
        return view('inquilino/index', compact('user'));
    }
    public function perfil(){

        $user = Auth::user();
        return view('inquilino/perfil', compact('user'));

    }
    public function edit($id){

        $user = Inquilino::find($id);
        return view('inquilino.edit', compact('user'));
        //return 'editame';

    }
    public function update(Request $request, $id)
    {
        $this->validate($request,['nombre' => 'required','apellidos' => 'required','genero' => 'required', 'nacionalidad' => 'required', 'fecha_nacimiento' => 'required|date_format:Y-m-d|before:yesterday', 'email' => 'required','telefono' => 'required','usuario' => 'required', 'fotos' => 'image']);
        $nombre = $request->input('nombre');
        $apellidos = $request->input('apellidos');
        $email = $request->input('email');
        $telefono = $request->input('telefono');
        $fecha_nacimiento = $request->input('fecha_nacimiento');
        $genero = $request->input('genero');
        $nacionalidad = $request->input('nacionalidad');
        $usuario = $request->input('usuario');

        if ($request->hasFile('fotos')){
            $image = $request->file('fotos');
            $image->move('uploads', $image->getClientOriginalName());
            Inquilino::where('id_inquilino', $id)->update(array('nombre' => $nombre,'apellidos' => $apellidos,
                'genero' => $genero, 'nacionalidad' => $nacionalidad, 'fecha_nacimiento' => $fecha_nacimiento, 'email' => $email,'telefono' => $telefono,
                'usuario' => $usuario, 'foto' => $image->getClientOriginalName()));
            // return 'hay foto';
        }else{

            $foto = 'user.png';
            Inquilino::where('id_inquilino', $id)->update(array('nombre' => $nombre,'apellidos' => $apellidos,
                'genero' => $genero, 'nacionalidad' => $nacionalidad, 'fecha_nacimiento' => $fecha_nacimiento, 'email' => $email,'telefono' => $telefono,'usuario' => $usuario, 'foto' => $foto));
            //return 'no hay foto';
        }
        return redirect()->action('InquilinoController@perfil')->with('success','Perfil actualizado');
       /*$inqui = Inquilino::find($id);
       return $inqui->nombre;*/
    }

    public function reservas()
    {
        $user = Auth::user();
        $reservas = Alquiler::where('id_inquilino', $user->id_inquilino)->where('status_alquiler', 'Reservado')->orderBy('id_alquiler', 'DESC')->whereNull('deleted_at')->paginate(10);
        return view('inquilino/reservas', compact('reservas', 'user'));
    }

    public function historial()
    {
        $user = Auth::user();
        $historicas = Alquiler::where('id_inquilino', $user->id_inquilino)->where('status_alquiler', '!=','Reservado')->orwhere('status_alquiler', 'Finalizado')->orwhere('status_alquiler', 'Anulado')->orderBy('id_alquiler', 'ASC')->whereNull('deleted_at')->paginate(10);
        return view('inquilino/historial', compact( 'historicas','user'));
    }
    public function busqueda()
    {
        $user = Auth::user();

        /*$propiedad = DB::table('propiedad')
                                //->join ('multimedia', 'multimedia.id_propiedad', '=', 'propiedad.id_propiedad' )

                                ->orderBy('propiedad.id_propiedad', 'asc')
                                ->get();
        $multimedia = DB::table('multimedia')
                                ->orderBy('id_propiedad', 'asc')
                                ->get();

        $fechas = DB::table('fecha_disponibilidad')
                            ->orderBy('id_fecha_disponibilidad', 'asc')
                            ->get();*/
        //echo $propiedad;
        //$propiedad = Propiedad::where('multimedia')->orderBy('id_propiedad', 'ASC')->paginate(10);
        return view('inquilino/busqueda', compact('user'));
    }

    

    public function busqueda_prop(Request $request)
    {
        $user = Auth::user();
        $ciudad = request::input('ciudad');
        $min = request::input('min');
        $max = request::input('max');
        $startdate = request::input('startDate');
        $enddate = request::input('endDate');

        //  $propiedad = Propiedad::where('ciudad', '=', $ciudad)->where('costo', '=', $min)->where('costo', '=', $max)->orderBy('id_propiedad', 'ASC')->paginate(10);
        $propiedad = DB::table('propiedad')
                                ->where('ciudad', '=', $ciudad)
                                ->where('costo', '>=', $min)
                                ->where('costo', '<=', $max)
                                
                                ->get();
        $multimedia = DB::table('multimedia')
                                ->orderBy('id_propiedad', 'asc')
                                ->get();
        $fechas = DB::table('fecha_disponibilidad')
                                ->whereBetween('fecha_inicio', [$startdate, $enddate])
                                
                                ->get();                                
        
        return view('inquilino/propiedades', compact('user', 'propiedad', 'multimedia', 'fechas'));
    }

    public function location($id)
    {
        $user = Auth::user();
        $propiedad =  Propiedad::find($id);
        $baseurl = "https://www.google.com/maps/dir/?api=1";
        $fin = $baseurl . "&destination=" . $propiedad->latitud . "," . $propiedad->longitud . "";
        return redirect($fin);
//        return view('inquilino/direcciones',compact('fin', 'user', 'propiedad'));
    }

    public function anularReserva($id)
    {
        Alquiler::find($id)->delete();
        return redirect()->route('reservas')->with('success','Registro eliminado logicamente');
    }

    public function consulta($id)
    {
        $user = Auth::user();
        $propiedad = Propiedad::find($id);
        return view('inquilino/enviarConsulta', compact('user', 'propiedad'));
    }

    public function getConsulta()
    {
        $user = Auth::user();
        $consultas = Consulta::where('id_inquilino',  $user->id_inquilino)->orderBy('id_consultas', 'ASC')->whereNull('deleted_at')->paginate(10);
        return view('inquilino/consultas', compact('user', 'consultas'));
    }

    public function getPropiedad($id)
    {
        $propiedad = Propiedad::find($id);

        $user = Auth::user();
        $config = array();
        $config['center'] = 'auto';
        $config['map_width'] = 500;
        $config['map_height'] = 400;
        $config['zoom'] = 15;
        $config['onboundschanged'] = 'if (!centreGot) {
            var mapCentre = map.getCenter();
            marker_0.setOptions({
                position: new google.maps.LatLng(mapCentre.lat(), mapCentre.lng())

            });
        }
        centreGot = true;';

        \Gmaps::initialize($config);

        // Colocar el marcador
        // Una vez se conozca la posición del usuario
        $marker = array();

        \Gmaps::add_marker($marker);
        $multimedia = DB::table('multimedia')
                                ->where('id_propiedad', '=', $id)
                                ->get();

        $fechas = DB::table('fecha_disponibilidad')
                                ->orderBy('id_fecha_disponibilidad', 'asc')
                                ->get();
        //echo $multimedia;
        $map = \Gmaps::create_map();
        return view('inquilino/prop_vista', compact('user', 'propiedad', 'map', 'multimedia', 'fechas'));
    }



}
