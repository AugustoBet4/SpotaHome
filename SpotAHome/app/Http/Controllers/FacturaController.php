<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Propiedad;

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
        return view('factura.create', ['num'=>$num, 'item'=>$item]);
    }
}
