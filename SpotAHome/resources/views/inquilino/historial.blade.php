@extends('layouts.app_inquilino')

@section('title', 'Historial de Reservas Page')

@section('content')
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="text-center">
                    <h1>
                        Historial de Reservas
                    </h1>
                    <small>Aqui podra ver un listado de todas las reservas que ha realizado por medio de la plataforma.</small>
                </div>
            </div>
        </div>
    </div>

    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-content">

                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover dataTables-example" >
                                <thead>
                                <tr>
                                    <th>Nro.</th>
                                    <th>Fecha Inicio</th>
                                    <th>Fecha Fin</th>
                                    <th>Propiedad</th>
                                </tr>
                                </thead>
                                <tbody>

                                @if($historial->count())
                                    @foreach($historial as $reserva)
                                        <tr>
                                            <td>{{$reserva->fecha_inicio}}</td>
                                            <td>{{$reserva->fecha_fin}}</td>
                                            <td>{{$reserva->propiedad->direccion}}</td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="12" class="text-center">No haz realizado Reservas. Ve al buscador y reliza una :D</td>
                                    </tr>
                                @endif
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
