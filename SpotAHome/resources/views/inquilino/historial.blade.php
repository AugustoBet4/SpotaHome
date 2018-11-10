@extends('layouts.app_inquilino')

@section('title', 'Historial de Reservas')

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
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover dataTables-example" >
                                        <thead>
                                        <tr>
                                            <th>Nro.</th>
                                            <th>Fecha Inicio</th>
                                            <th>Fecha Fin</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            @if($historicas->count())
                                                @foreach($historicas as $key=>$historia)
                                                    <tr>
                                                        <td>{{$key+1}}</td>
                                                        <td>{{$historia->fecha_inicio}}</td>
                                                        <td>{{$historia->fecha_fin}}</td>
                                                        {{--  <td>{{$reserva->propiedad->direccion}}</td>  --}}
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
                                {{ $historicas->links() }}
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
@endsection
