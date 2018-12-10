@extends('layouts.app_empleado')

@section('title', 'Inicio de Empleado')

@section('content')
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <section class="content">
                <div class="col-md-12 col-md-offset-0">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div align="center">
                                <h1>Agenda de Homechechers</h1>
                            </div>

                            <div class="table-container">
                                <table id="mytable" class="table table-bordred table-striped">
                                    <thead>
                                    <th>Estado</th>
                                    <th>Fecha</th>
                                    <th>Hora</th>
                                    <th>Observaciones</th>
                                    <th>Empleado</th>
                                    <th>Propiedad</th>
                                    <th>Editar</th>
                                    </thead>
                                    <tbody>
                                    @if($empleados->count())
                                        @foreach($empleados as $empleado)
                                            <tr>
                                                <td>{{$empleado->estado}}</td>
                                                <td>{{$empleado->fecha}}</td>
                                                <td>{{$empleado->hora}}</td>
                                                <td>{{$empleado->observaciones}}</td>
                                                <td>{{$empleado->nombre}}</td>
                                                <td>{{$empleado->direccion}}</td>
                                                <td><a class="btn btn-primary btn-xs" href="{{action('EmpleadoController@edit', $empleado->id_verificacion_propiedad)}}" ><span class="glyphicon glyphicon-pencil"></span></a></td>

                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="8">No hay registro !!</td>
                                        </tr>
                                    @endif
                                    </tbody>

                                </table>
                            </div>
                        </div>
                        {{ $empleados->links() }}
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
