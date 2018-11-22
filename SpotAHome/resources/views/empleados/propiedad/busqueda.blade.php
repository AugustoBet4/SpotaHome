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
                                <h1>Listado de busqueda</h1>
                            </div>
                            <div class="pull-right">
                                <div class="btn-group">
                                    <a href="{{ url('empleados/propiedad/index') }}" class="btn btn-info" >Volver</a>
                                </div>
                            </div>
                            <div class="table-container">
                                <table id="mytable" class="table table-bordred table-striped">
                                    <thead>
                                    <th>Direccion</th>
                                    <th>Ciudad</th>
                                    <th>Zona</th>
                                    <th>Dueño</th>
                                    <th>Descripcion</th>
                                    <th>Costo</th>
                                    <th>Estado</th>
                                    <th>Editar</th>
                                    <th>Ver en Mapa</th>
                                    <!--
                                    <th>Eliminar</th>
                                    -->
                                    </thead>
                                    <tbody>
                                    @if($propiedades->count())
                                        @foreach($propiedades as $propiedad)
                                            <tr>
                                                <td>{{$propiedad->direccion}}</td>
                                                <td>{{$propiedad->ciudad}}</td>
                                                <td>{{$propiedad->zona}}</td>
                                                <td>{{$propiedad->nombre}}</td>
                                                <td>{{$propiedad->descripcion}}</td>
                                                <td>{{$propiedad->costo}}</td>
                                                <td>{{$propiedad->status_alquiler}}</td>
                                                <td><a class="btn btn-primary btn-xs" href="{{action('PropiedadEmpleadoController@edit', $propiedad->id_propiedad)}}" ><span class="glyphicon glyphicon-pencil"></span></a></td>
                                            <!--
                                                <td>
                                                    <form action="{//{action('PropiedadEmpleadoController@edit', $propiedad->id_propiedad)}}" method="post">
                                                        {//{csrf_field()}}
                                                <input name="_method" type="hidden" value="DELETE">
                                                <button class="btn btn-danger btn-xs" type="submit"><span class="glyphicon glyphicon-trash"></span></button>
                                            </form>
                                        </td>
-->
                                                <td>
                                                    <a class="btn btn-primary btn-xs" href="{{action('MapaEmpleadoController@location', $propiedad->id_propiedad)}}" ><span class="glyphicon glyphicon-flag "></span></a>
                                                <!--
                                                    <a class="btn btn-primary btn-xs" href="{{route('empleados.mapa')}}" ><span class="glyphicon glyphicon-flag "></span></a>
                                                -->
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
                        {{ $propiedades->links() }}
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
