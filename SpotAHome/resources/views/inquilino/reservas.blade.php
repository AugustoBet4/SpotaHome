@extends('layouts.app_inquilino')

@section('title', 'Anulacion de Reserva')

@section('content')
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="text-center">
                    <h1>
                        Reservas
                    </h1>
                    <small>Aqui podra ver un listado de todas las reservas que tiene actualmente activas para que pueda eliminarlas.</small>
                </div>
            </div>
        </div>
    </div>

    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="tabs-container">
                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#tab-1"> Reservas Actuales</a></li>
                        <li class=""><a data-toggle="tab" href="#tab-2">Reservas Historicas</a></li>
                    </ul>
                    <div class="tab-content">
                        <div id="tab-1" class="tab-pane active">
                            <div class="panel-body">
                                <div class="ibox float-e-margins">
                                    <div class="ibox-content">

                                        <div class="table-responsive">
                                            <table class="table table-striped table-bordered table-hover dataTables-example" >
                                                <thead>
                                                <tr>
                                                    <th>Nro.</th>
                                                    <th>Fecha Inicio</th>
                                                    <th>Fecha Fin</th>
                                                    <th>Opcion</th>
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
                                                                <form method="post">
                                                                    {{csrf_field()}}
                                                                    <input name="_method" type="hidden" value="DELETE">
                                                                    <button class="btn btn-danger btn-xs" type="submit"><i class="fa fa-eraser"></i></button>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                @else
                                                    <tr>
                                                        <td colspan="12" class="text-center">No tiene reservas activas. Ve al buscador y reliza una :D</td>
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
                        <div id="tab-2" class="tab-pane">
                            <div class="panel-body">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
