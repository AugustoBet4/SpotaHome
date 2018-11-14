@extends('layouts.app_inquilino')

@section('title', 'Anulacion de Reserva')

@section('content')
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="text-center">
                    <h1>
                        Consultas Realizadas
                    </h1>
                    <small>Aqui podra ver un listado de todas las consultas que tiene realizadas.</small>
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
                                        <th>Fecha</th>
                                        <th>Consulta</th>
                                        <th>Estado</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if($consultas->count())
                                        @foreach($consultas as $key=>$consulta)
                                            <tr>
                                                <td>{{$key+1}}</td>
                                                <td>{{$consulta->created_at->toDateString()}}</td>
                                                <td>{{$consulta->consulta}}</td>
                                                @if($consulta->estado === "PENDIENTE")
                                                    <td> <span class="label label-default"><i class="fa fa-clock-o"></i> {{ $consulta->estado }}</span></td>
                                                @elseif($consulta->estado === 'RECHAZADO')
                                                    <td> <span class="label label-danger"><i class="fa fa-times"></i> {{ $consulta->estado }}</span></td>
                                                @else
                                                    <td> <span class="label label-primary"><i class="fa fa-check"></i> {{ $consulta->estado }}</span></td>
                                                @endif
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="12" class="text-center">No tiene consultas realizadas.
                                            </td>
                                        </tr>
                                    @endif
                                    </tbody>
                                </table>
                            </div>
                            {{ $consultas->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
