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
                                <h1>Listado de empleados</h1>
                            </div>
                            <div class="pull-right">
                                <div class="btn-group">
                                    <a href="{{ action('EmpleadoController@create') }}" class="btn btn-info" >Añadir empleado</a>
                                </div>
                            </div>
                            <div class="table-container">
                                <table id="mytable" class="table table-bordred table-striped">
                                    <thead>
                                    <th>Nombre</th>
                                    <th>Apellidos</th>
                                    <th>Email</th>
                                    <th>Telefono</th>
                                    <th>Usuario</th>
                                    <th>Editar</th>
                                    </thead>
                                    <tbody>
                                    @if($empleados->count())
                                        @foreach($empleados as $empleado)
                                            <tr>
                                                <td>{{$empleado->nombre}}</td>
                                                <td>{{$empleado->apellidos}}</td>
                                                <td>{{$empleado->email}}</td>
                                                <td>{{$empleado->telefono}}</td>
                                                <td>{{$empleado->usuario}}</td>
                                                <td><a class="btn btn-primary btn-xs" href="{{action('EmpleadoController@edit', $empleado->id_empleado)}}" ><span class="glyphicon glyphicon-pencil"></span></a></td>

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
