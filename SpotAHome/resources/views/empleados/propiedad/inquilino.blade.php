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
                            <div align="center">
                                <form method="get" action="{{ action('InquilinoEmpleadoController@busqueda') }}">
                                    <div class="col-md-2 col-md-offset-0" align="center">
                                        <input type="text" id="nombre" name="nombre" placeholder="Nombre" class="form-control input-sm">
                                    </div>
                                    <div class="col-md-2 col-md-offset-0">

                                        <input type="text" id="apellido" name="apellido" placeholder="Apellido" class="form-control input-sm">
                                    </div>
                                    <div class="col-md-2 col-md-offset-0">

                                        <input type="text" id="estado" name="estado" placeholder="Estado" class="form-control input-sm">
                                    </div>

                                    <div class="col-md-2 col-md-offset-0">

                                        <input type="text" id="fecha" name="fecha" placeholder="yyyy-mm-dd" class="form-control input-sm">
                                    </div>
                                    <div class="col-md-2 col-md-offset-0">
                                        <button type="submit" class="btn btn-primary" >Buscar</button>

                                    </div>
                                </form>
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
                        {{ $inquilinos->links() }}
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
