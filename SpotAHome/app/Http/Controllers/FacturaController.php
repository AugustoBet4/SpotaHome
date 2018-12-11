<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Propiedad;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\codigo_control\CodigoControlV7;
use Illuminate\Support\Facades\Mail;
use App;
use PDF;

class FacturaController extends Controller
{
    //gg

    public function __construct()
    {
        $this->middleware('auth:inquilino');
    }

    public function factura()
    {
        //gg

        $user = Auth::user();
        $num = Propiedad::count();
        $prop = Propiedad::all();
        return view('factura.add', ['num'=>$num, 'prop'=>$prop, 'user'=>$user]);
    }

    public function fin($id)
    {
        //
        $user = Auth::user();
        $item = Propiedad::find($id);
        $num = Propiedad::count();
        $prop = Propiedad::all();
        $cod = $this->codigo_control();
            $to_name = $user->nombre;
            $to_mail = $user->email;

        $data = array('infos' => $user->nombre);
        Mail::send('emails.mailfactura', $data, function ($message) use ($to_name, $to_mail){
            $message->to($to_mail, $to_name)
                ->subject('Factura de reserva');
            $message->from('augusto.bet4@gmail.com', 'SpotaHome');
        });
        return view('factura.create', ['num'=>$num, 'item'=>$item, 'cod'=>$cod, 'user'=>$user]);
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

    public function print($id)
    {
        $user = Auth::user();
        $item = Propiedad::find($id);
        $num = Propiedad::count();
        $prop = Propiedad::all();
        $cod = $this->codigo_control();
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadView('factura.create', ['num'=>$num, 'item'=>$item, 'cod'=>$cod, 'user'=>$user]);
        return $pdf->stream();
    }
}
