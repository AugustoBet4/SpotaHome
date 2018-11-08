<?php

namespace App\Http\Controllers;

use App\Alquiler;
use App\Propiedad;

class InquilinoController extends Controller
{
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

    public function anular()
    {
        $reservas = Alquiler::orderBy('id_alquiler', 'ASC')->paginate(10);
        return view('inquilino/anular', compact('reservas'));
    }

    public function anularReserva($id)
    {
        Alquiler::find($id)->delete();
        return redirect()->route('inquilino.index')->with('success','Registro eliminado satisfactoriamente');
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

        $propiedad = Propiedad::orderBy('id_propiedad', 'ASC')->paginate(10);
        return view('inquilino/busqueda', compact('map', 'propiedad'));
    }
}
