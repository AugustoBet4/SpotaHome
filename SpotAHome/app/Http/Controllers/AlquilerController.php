<?php

namespace App\Http\Controllers;

use App\Dueno;
use App\Propiedad;
use Illuminate\Http\Request;
use App\Alquiler;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\FechasRequest;

class AlquilerController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $alquiler = Alquiler::orderBy('id_alquiler','ASC')->paginate(10);
        return view ('inquilino.reserva',compact('alquiler'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('empleados.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $propiedad = Propiedad::find($request->id_propiedad);
        $estadia = $propiedad->estadia_max;
        $this->validate($request,['status_alquiler' => 'required',
            'fecha_inicio' => 'required|date|date_format:Y-m-d|after:yesterday',
            'fecha_fin' => 'required|date_format:Y-m-d|after:fecha_inicio|before:'.$estadia.' months']);
        Alquiler::create($request->all());
        
        $infos = DB::table('dueno')
            ->join('propiedad', 'propiedad.id_dueno', '=', 'dueno.id_dueno')
            ->join('alquiler', 'alquiler.id_propiedad', '=', 'propiedad.id_propiedad')
            ->where('alquiler.id_alquiler' , '=', $request->id_alquiler)
            ->where('propiedad.id_propiedad', '=', $request->id_propiedad)
            ->select('dueno.nombre', 'dueno.apellidos', 'dueno.email', 'propiedad.direccion', 'alquiler.fecha_inicio', 'alquiler.fecha_fin')
            ->get();
        
            $to_name = 'David';
            $to_mail = 'daalfaro96@gmail.com';
        
        $data = array('infos' => $infos);
        Mail::send('emails.mail_reserva', $data, function ($message) use ($to_name, $to_mail){
            $message->to($to_mail, $to_name)
                    ->subject('Su propiedad fue reservada');
            $message->from('augusto.bet4@gmail.com', 'SpotaHome');
        });

        return redirect()->route('reservas')->with('success','Reserva registrada');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $propiedades=Propiedad::find($id);
        return view('inquilino.edit',compact('propiedades'));
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,['status_alquiler' => 'required']);
        Alquiler::find($id)->update($request->all());
        $infos = DB::table('dueno')
            ->join('propiedad', 'propiedad.id_dueno', '=', 'dueno.id_dueno')
            ->join('alquiler', 'alquiler.id_propiedad', '=', 'propiedad.id_propiedad')
            ->where('alquiler.id_alquiler' , '=', $request->id_alquiler)
            ->where('propiedad.id_propiedad', '=', $request->id_propiedad)
            ->select('dueno.nombre', 'dueno.apellidos', 'dueno.email', 'propiedad.direccion', 'alquiler.fecha_inicio', 'alquiler.fecha_fin')
            ->get();
        foreach ($infos as $info) {
            $to_name = $info->nombre;
            $to_mail = $info->email;
        }

        $data = array('infos' => $infos);
        Mail::send('emails.mail', $data, function ($message) use ($to_name, $to_mail){
            $message->to($to_mail, $to_name)
                    ->subject('Anulacion de reserva');
            $message->from('augusto.bet4@gmail.com', 'SpotaHome');
        });
        return redirect()->route('reservas')->with('success','Reserva actualizada');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Alquiler::find($id)->delete();
        return redirect()->route('reservas')->with('success','Registro eliminado logicamente');
    }
}
