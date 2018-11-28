@extends('layouts.app_duenos')

@section('title', 'Reservas')

@section('content')
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="text-center">
                    <h1>
                        Reservas
                    </h1>
                    <small>Aqui podra ver un listado de todas las reservas que tienen sus propiedades.</small>
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
                                        <th>Fecha Inicial</th>
                                        <th>Fecha Final</th>
                                        <th>Estado</th>
                                        <th>Propiedad - Direccion</th>
                                    </tr>
                                    </thead>
                                    <tr>
                                        @if($reservas->count())
                                            @foreach($reservas as $key=>$reserva)
                                                <td>{{ $key+1 }}</td>
                                                <td>{{ $reserva->fecha_inicio }}</td>
                                                <td>{{ $reserva->fecha_fin }}</td>
                                                @if($reserva->status_alquiler == "Reservado")
                                                    <td>
                                                        <span class="label label-primary"><i class="fa fa-calendar-check-o"></i> {{ $reserva->status_alquiler }}</span>
                                                    </td>
                                                @elseif($reserva->status_alquiler == "Finalizado")
                                                    <td>
                                                        <span class="label label-info"><i class="fa fa-check"></i> {{ $reserva->status_alquiler }}</span>
                                                    </td>
                                                @else
                                                    <td>
                                                        <span class="label label-danger"><i class="fa fa-check"></i> {{ $reserva->status_alquiler }}</span>
                                                        <span class="label label-indo"> Fecha de Anulacion: {{ date('Y-m-d', strtotime($reserva->updated_at)) }}</span>
                                                    </td>
                                                @endif
                                            <td>{{ $reserva->direccion }}</td>
                                        </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="12" class="text-center">No tiene reservas.
                                            </td>
                                        </tr>
                                    @endif
                                </table>
                            </div>
                            {{ $reservas->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
