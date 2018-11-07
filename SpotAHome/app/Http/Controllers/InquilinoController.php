<?php

namespace App\Http\Controllers;

class InquilinoController extends Controller
{
    public function index()
    {
        return view('inquilino/index');
    }

    public function historial()
    {
        return view('inquilino/historial');
    }

    public function anular()
    {
        return view('inquilino/anular');
    }

    public function busqueda()
    {
      //configuaración
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
        return view('inquilino/busqueda', compact('map'));
    }
}
