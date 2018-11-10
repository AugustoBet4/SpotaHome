<?php

namespace App\Http\Controllers;

use App\Alquiler;
use App\Propiedad;
use Illuminate\Support\Facades\Auth;

class InquilinoController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:inquilino');
    }

    public function index()
    {
        return view('inquilino/index');
    }

    public function historial()
    {
//        $user = \Auth::inquilino()->id;
//        $historial = Alquiler::where('id_inquilino', $user)->orderBy('id_alquiler', 'ASC')->paginate(10);
        $historial = Alquiler::orderBy('id_alquiler', 'ASC')->paginate(10);
        return view('inquilino/historial', compact('historial'));
    }

    public function reservas()
    {
        $user = Auth::id();
        $reservas = Alquiler::where('id_inquilino', $user)->where('status_alquiler', 'Reservado')->orderBy('id_alquiler', 'ASC')->paginate(10);
        $historicas = Alquiler::where('id_inquilino', $user)->where('status_alquiler', 'Finalizado')->orderBy('id_alquiler', 'ASC')->paginate(10);
        return view('inquilino/reservas', compact('reservas'), compact('historicas'));
    }

    public function anularReserva($id)
    {
        Alquiler::find($id)->delete();
        return redirect()->route('inquilino.reservas')->with('success','Registro eliminado satisfactoriamente');
    }

    public function busqueda()
    {
      //**********************************
      //configuaración generacion del mapa
        $config = array();
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

        //$propiedad = Propiedad::orderBy('id_propiedad', 'ASC')->paginate(10);
        return view('inquilino/busqueda', compact('map', 'propiedad'));
    }

    public function busqueda_prop()
    {
        return view('inquilino/propiedades');
    }

}
