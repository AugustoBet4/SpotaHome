<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Inquilino;

class InquilinoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Paginacion!
        $inquilinos=Inquilino::orderBy('id_inquilinos','ASC')->paginate(5);

        return view('inquilino.index', compact('inquilinos'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Esto si no entiendo, una vista supongo
        return view('inquilino.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request,['nombre'=>'required','email'=>'required','telefono'=>'required','fecha_nacimiento'=>'required','genero'=>'required','nacionalidad'=>'required','usuario'=>'required','contraseña'=>'required']);
        Inquilino::create($request->all());
        return redirect()->route('inquilino.index')->with('success','Registro creado satisfactoriamente');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $inquilinos=Inquilino::find($id);
        return view('inquilino.show', compact('inquilinos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $inquilinos=Inquilino::find($id);
        return view('inquilino.edit',compact('inquilinos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $this->validate($request,['nombre'=>'required','email'=>'required','telefono'=>'required','fecha_nacimiento'=>'required','genero'=>'required','nacionalidad'=>'required','usuario'=>'required','contraseña'=>'required']);
        Inquilino::find($id)->update($request->all());

        return redirect()->route('inquilino.index')->with('success','Registro actualizado satisfactoriamente');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Inquilino::find($id)->delete();
        return redirect()->route('inquilino.index')->with('success','Registro eliminado satisfactoriamente');
    }
}
