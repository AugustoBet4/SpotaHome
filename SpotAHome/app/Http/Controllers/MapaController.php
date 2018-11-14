<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MapaController extends Controller
{
    //
    public function mapa(){
        $config = array();
        $config['center'] = '-16.4897, -68.1193';
        $config['zoom'] = 'auto';
        $config['onboundschanged'] = 'if (!centreGot) {
            var mapCentre = map.getCenter();
            marker_0.setOptions({
                position: new google.maps.LatLng(mapCentre.lat(), mapCentre.lng())
            });
        }
        centreGot = true;';

        app('map')->initialize($config);

        // set up the marker ready for positioning
        // once we know the users location
        $marker = array();
        app('map')->add_marker($marker);

        $map = app('map')->create_map();
        //echo "<html><head><script type='text/javascript'>var centreGot = false;</script>".$map['js']."</head><body>".$map['html']."</body></html>";
        return view('empleados/mapa');
    }
}
