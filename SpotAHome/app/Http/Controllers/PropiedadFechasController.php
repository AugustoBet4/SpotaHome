<?php

namespace App\Http\Controllers;
use App\Alquiler;
use Illuminate\Http\Request;
use App\Dueno;
use App\Propiedad;
use Auth;
use App\Inquilino;
use App\Fecha_Disponible;
use Illuminate\Support\Facades\DB;

class PropiedadFechasController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:dueno');
    }


    public function index()
    {

    }
    public function edit($id)
    {
        $propiedades = Propiedad::find($id);

        $fechas = Fecha_Disponible::where('id_propiedad','=',$id)->get()->first();
        return view('duenos.editfechas', compact('propiedades', 'fechas'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,['fecha_inicio' => 'required','fecha_fin' => 'required']);
       Fecha_Disponible::find($id)->update($request->all());
        return redirect()->route('propiedad.index')->with('success','Fechas actualizadas');
    }
    public function create(){

    }
    public function store(Request $request)
    {



    }

}
