<?php

namespace App\Http\Controllers;

use App\Alquiler;
use App\Consulta;
use App\Dueno;
use App\Inquilino;
use App\Propiedad;
use App\Valoracion_Inquilino_Propiedad;
use Illuminate\Support\Facades\Auth;
use Request;
Use DB;
use App\Multimedia;


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

    public function reservas()
    {
        $user = Auth::user();
        $reservas = Alquiler::where('id_inquilino', $user->id_inquilino)->where('status_alquiler', 'Reservado')->orderBy('id_alquiler', 'DESC')->whereNull('deleted_at')->paginate(10);
        return view('inquilino/reservas', compact('reservas', 'user'));
    }

    public function historial()
    {
        $user = Auth::user();
        $historicas = Alquiler::where('id_inquilino', $user->id_inquilino)->where('status_alquiler', 'Finalizado')->orderBy('id_alquiler', 'ASC')->whereNull('deleted_at')->paginate(10);
        return view('inquilino/historial', compact( 'historicas','user'));
    }

    public function busqueda()
    {
        $user = Auth::user();

        $propiedad = DB::table('propiedad')
                                //->join ('multimedia', 'multimedia.id_propiedad', '=', 'propiedad.id_propiedad' )

                                ->orderBy('propiedad.id_propiedad', 'asc')
                                ->get();
        $multimedia = DB::table('multimedia')
                                ->orderBy('id_propiedad', 'asc')
                                ->get();
        //echo $propiedad;
        //$propiedad = Propiedad::where('multimedia')->orderBy('id_propiedad', 'ASC')->paginate(10);
        return view('inquilino/propiedades', compact('user', 'propiedad', 'multimedia'));
    }

    public function busqueda_prop(Request $request)
    {
        $user = Auth::user();
        $ciudad = request::input('ciudad');
        $min = request::input('min');
        $max = request::input('max');
        //  $propiedad = Propiedad::where('ciudad', '=', $ciudad)->where('costo', '=', $min)->where('costo', '=', $max)->orderBy('id_propiedad', 'ASC')->paginate(10);
        $propiedad = DB::table('propiedad')
                                ->where('ciudad', '=', $ciudad)
                                ->where('costo', '>=', $min)
                                ->where('costo', '<=', $max)

                                ->get();


        return view('inquilino/propiedades', compact('user', 'propiedad'));
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
        echo $multimedia;
        $map = \Gmaps::create_map();
        return view('inquilino/prop_vista', compact('user', 'propiedad', 'map', 'multimedia'));
    }



}
