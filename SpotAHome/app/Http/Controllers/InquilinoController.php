<?php

namespace App\Http\Controllers;

use App\Alquiler;
use App\Dueno;
use App\Inquilino;
use App\Propiedad;
use App\Valoracion_Inquilino_Propiedad;
use Illuminate\Support\Facades\Auth;
use Request;

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
        $reservas = Alquiler::where('id_inquilino', $user->id_inquilino)->where('status_alquiler', 'Reservado')->orderBy('id_alquiler', 'ASC')->whereNull('deleted_at')->paginate(10);
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
      //**********************************
      //configuaración generacion del mapa
        /*$config = array();
        $config['center'] = 'auto';
        $config['map_width'] = 550;
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

        $map = \Gmaps::create_map();

        //******************************************
        */

        return view('inquilino/busqueda', compact('map', 'propiedad', 'user'));
    }

    public function busqueda_prop()
    {
        $user = Auth::user();
        $ciudad = request::input('ciudad');
        $propiedad = Propiedad::where('ciudad', '=', $ciudad)->orderBy('id_propiedad', 'ASC')->paginate(10);
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

}
