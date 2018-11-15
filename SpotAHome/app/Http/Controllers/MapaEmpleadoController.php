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


class MapaEmpleadoController extends Controller
{

    public function location($id)
    {
        /*
        $user = Auth::user();
        $propiedad =  Propiedad::find($id);
        $baseurl = "https://www.google.com/maps/dir/?api=1";
        $fin = $baseurl . "&destination=" . $propiedad->latitud . "," . $propiedad->longitud . "";
        return redirect($fin);
//        return view('inquilino/direcciones',compact('fin', 'user', 'propiedad'));
*/
        $propiedad =  Propiedad::find($id);
        $lat = (String) $propiedad->latitud;
        $lon = (String )$propiedad->longitud;
        $datos = $lat.",".$lon;
        $config = array();
        $config['center'] =  $datos;
        //  $config['center'] = $datos;
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
        echo "<html><head><script type='text/javascript'>var centreGot = false;</script>".$map['js']."</head><body>".$map['html']."</body></html>";
    }
    public function mapageneral(){

        $lonlat = DB::table('propiedad')
            ->select('propiedad.latitud','propiedad.longitud','propiedad.direccion')
            ->get();
        $config['center'] = '37.4419, -122.1419';
        $config['zoom'] = 'auto';
        app('map')->initialize($config);
        foreach($lonlat as $ll){
            $lat = (String) $ll->latitud;
            $lon = (String )$ll->longitud;
            $dir = (String )$ll->direccion;
            $datos = $lat.",".$lon;
            //$alert = 'alert("'.$dir.'")';
            $marker = array();
            $marker['position'] = $datos;
            $marker['onclick'] = 'alert("Me presionaste")';
            app('map')->add_marker($marker);
            }


        $map = app('map')->create_map();
        echo "<html><head><script type='text/javascript'>var centreGot = false;</script>".$map['js']."</head><body>".$map['html']."</body></html>";
    }

}
