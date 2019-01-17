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
                                <h1>Listado de propiedades</h1>
                            </div>
                            <div align="center">
                                <form method="get" action="{{ action('PropiedadEmpleadoController@busqueda') }}">
                                <div class="col-md-2 col-md-offset-0" align="center">
                                    <!--
                                    <input type="text" id="precio" name="precio" placeholder="Costo" class="form-control input-sm">
                                    -->
                                    <select class="form-control" name="precio" id="precio" >
                                        <option>5000</option>
                                        <option>2500</option>
                                        <option>2000</option>
                                        <option>1500</option>
                                        <option>1000</option>
                                        <option>500</option>
                                    </select>
                                </div>
                                <div class="col-md-2 col-md-offset-0">
                                    <select  class="form-control" name="city" id="city" >
                                        <option>Seleccione ciudad</option>
                                        @foreach($ciudades as $ciudad)
                                            <option value="{{ $ciudad->id_propiedad }}"> {{ $ciudad->ciudad }}</option>
                                        @endforeach
                                    </select>
                                    <!--
                                        <input type="text" id="city" name="city" placeholder="Ciudad" class="form-control input-sm">
                                        -->
                                </div>
                                <div class="col-md-2 col-md-offset-0">
                                    <select  class="form-control" name="zone" id="zone">
                                        <option>Seleccione zona</option>
                                        @foreach($zonas as $zona)
                                            <option value="{{ $zona->id_propiedad }}"> {{ $zona->zona }}</option>
                                        @endforeach
                                    </select>
                                    <!--
                                        <input type="text" id="zone" name="zone" placeholder="Zona" class="form-control input-sm">
                                        -->
                                </div>
                                <div class="col-md-2 col-md-offset-0">
                                    <button type="submit" class="btn btn-primary" >Buscar</button>
                                    <!--
                                    <a href="{{action('PropiedadEmpleadoController@busqueda') }}" class="btn btn-info" >Buscar</a>
                                    -->
                                </div>
                                </form>
                            </div>
                            <div></div>
                            <div class="pull-right">
                                <div class="btn-group">
                                    <a href="{{ url('empleados/propiedad/create') }}" class="btn btn-info" >Añadir Propiedad</a>
                                </div>
                                <div class="btn-group">
                                    <a href="{{ route('empleado.mapageneral') }}" class="btn btn-info" >Mapa general</a>
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
                                    <!--
                                    <th>Estado</th>
                                    -->
                                    <th>Editar</th>
                                    <th>Ver en Mapa</th>
                                    <th>Homechecker</th>
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
                                                <!--
                                                <td>{//{$propiedad->status_alquiler}}</td>
                                                -->
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
                                                    <a class="btn btn-primary btn-xs" href="{{action('MapaEmpleadoController@location', $propiedad->id_propiedad)}}" ><span class="glyphicon glyphicon-flag "></span></a></td>

                                                <td>
                                                    <a class="btn btn-primary btn-xs" href="{{action('EmpleadoHomecheckersController@cita')}}" ><span class="glyphicon glyphicon-flag "></span></a></td>
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
