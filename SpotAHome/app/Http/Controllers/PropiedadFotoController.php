<?php

namespace App\Http\Controllers;
use App\Alquiler;
use App\Multimedia;
use Illuminate\Http\Request;
use App\Dueno;
use App\Propiedad;
use Auth;
use App\Inquilino;
use App\Fecha_Disponible;
use Illuminate\Support\Facades\DB;

class PropiedadFotoController extends Controller
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

        $foto = Multimedia::where('id_propiedad','=',$id)->get()->first();
        return view('duenos.editfoto', compact('propiedades', 'foto'));
    }

    public function update(Request $request, $id)
    {

        $this->validate($request,['imagen'=> 'required|image']);
        $image = $request->file('imagen');
        $image->move('uploads', $image->getClientOriginalName());
        Multimedia::where('id_multimedia', $id)->update(array('uri' => $image->getClientOriginalName() ));
        return redirect()->route('propiedad.index')->with('success','Foto actualizada');
    }
    public function create(){

    }
    public function store(Request $request)
    {



    }

}
