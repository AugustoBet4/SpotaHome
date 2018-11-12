@extends('layouts.app_inquilino')

@section('title', 'Anulacion de Reserva')

@section('content')
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="text-center">
                    <h1>
                        Historial de Reservas
                    </h1>
                    <small>Aqui podra ver un listado historico de todas las reservas que tiene en el sistema.</small>
                </div>
            </div>
        </div>
    </div>

    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="panel-body">
                    <div class="ibox float-e-margins">
                        <div class="ibox-content">
                            <div class="table-responsive-sm">
                                <table class="table table-striped table-bordered table-hover dataTables-example table-responsive">
                                    <thead>
                                    <tr>
                                        <th>Nro.</th>
                                        <th>Fecha Inicio</th>
                                        <th>Fecha Fin</th>
                                        <th colspan="3">Opciones</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if($reservas->count())
                                        @foreach($reservas as $key=>$reserva)
                                            <tr>
                                                <td>{{$key+1}}</td>
                                                <td>{{$reserva->fecha_inicio}}</td>
                                                <td>{{$reserva->fecha_fin}}</td>
                                                {{--  <td>{{$reserva->propiedad->direccion}}</td>  --}}
                                                <td>
                                                    {{--  action="{{action('InquilinoController@anularReserva', $reserva->id_alquiler)}}"  --}}
                                                    {{--<form method="post" action="{{ action('AlquilerController@destroy', $reserva->id_alquiler) }}">--}}
                                                        {{--{{csrf_field()}}--}}
                                                        {{--<input name="_method" type="hidden" value="DELETE">--}}
                                                        {{--<button class="btn btn-danger btn-xs" type="submit">--}}
                                                            {{--<i class="fa fa-eraser"></i> Anular--}}
                                                        {{--</button>--}}
                                                    {{--</form>--}}
                                                    {{--<form method="post" action="{{ action('PropiedadController@show', $reserva->id_propiedad) }}">--}}
                                                        {{--{{csrf_field()}}--}}
                                                        {{--<input name="_method" type="hidden" value="DELETE">--}}
                                                        {{--<button class="btn btn-primary btn-xs" type="submit">--}}
                                                            {{--<i class="fa fa-cart-plus"></i>Añadir a reserva--}}
                                                        {{--</button>--}}
                                                    {{--</form>--}}
                                                    <form method="post">
                                                        <button class="btn btn-warning btn-xs" type="button" onclick="window.location='{{ action('InquilinoController@location', $reserva->id_propiedad) }}'">
                                                            <i class="fa fa-map-signs"></i>Como llegar
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="12" class="text-center">No tiene reservas activas. Ve al
                                                buscador y reliza una :D
                                            </td>
                                        </tr>
                                    @endif
                                    </tbody>
                                </table>
                            </div>
                            {{ $reservas->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
