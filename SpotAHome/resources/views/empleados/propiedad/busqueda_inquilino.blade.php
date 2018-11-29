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
                                <h1>Listado de inquilinos</h1>
                            </div>
                            <div class="pull-right">
                                <div class="btn-group">
                                    <a href="{{ action('InquilinoEmpleadoController@index') }}" class="btn btn-info" >Volver</a>
                                </div>
                            </div>
                            <div class="table-container">
                                <table id="mytable" class="table table-bordred table-striped">
                                    <thead>
                                    <th>Nombre</th>
                                    <th>Apellidos</th>
                                    <th>Direccion de propiedad alquilada</th>
                                    <th>Estado</th>
                                    <th>Fecha Inicio</th>
                                    <th>Fecha Fin</th>
                                    </thead>
                                    <tbody>
                                    @if($inquilinos->count())
                                        @foreach($inquilinos as $inquilino)
                                            <tr>
                                                <td>{{$inquilino->nombre}}</td>
                                                <td>{{$inquilino->apellidos}}</td>
                                                <td>{{$inquilino->direccion}}</td>
                                                <td>{{$inquilino->status_alquiler}}</td>
                                                <td>{{$inquilino->fecha_inicio}}</td>
                                                <td>{{$inquilino->fecha_fin}}</td>
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
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
