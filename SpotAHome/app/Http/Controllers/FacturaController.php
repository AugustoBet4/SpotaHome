<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Propiedad;
use App\Http\Controllers\codigo_control\CodigoControlV7;

class FacturaController extends Controller
{
    //
    public function factura()
    {
        //

        $num = Propiedad::count();
        $prop = Propiedad::all();
        return view('factura.add', ['num'=>$num, 'prop'=>$prop]);
    }

    public function fin($id)
    {
        //
        $item = Propiedad::find($id);
        $num = Propiedad::count();
        $prop = Propiedad::all();
        $cod = $this->codigo_control();
        return view('factura.create', ['num'=>$num, 'item'=>$item, 'cod'=>$cod]);
    }

    public function codigo_control(){
        require_once('codigo_control/CodigoControlV7.php');

        $numero_autorizacion = '29040011007';
        $numero_factura = '1503';
        $nit_cliente = '4189179011';
        $fecha_compra = '20070702';
        $monto_compra = '2500';
        $clave = '9rCB7Sv4X29d)5k7N%3ab89p-3(5[A';

        return CodigoControlV7::generar($numero_autorizacion, $numero_factura, $nit_cliente, $fecha_compra, $monto_compra, $clave);
    }
}
