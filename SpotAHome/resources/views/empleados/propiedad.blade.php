@extends('layouts.app_empleado')

@section('title', 'Inicio de Empleado')

@section('content')
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <section class="content">
                <div class="col-md-10 col-md-offset-2">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="pull-left"><h1>Listado de propiedades</h1></div>
                            <div class="pull-right">
                                <!--
                                <div class="btn-group">
                                    <a href="{{ route('propiedad.create') }}" class="btn btn-info" >Añadir Propiedad</a>
                                </div>
                                -->
                            </div>
                            <div class="table-container">
                                <table id="mytable" class="table table-bordred table-striped">
                                    <thead>
                                    <th>Direccion</th>
                                    <th>Ciudad</th>
                                    <th>Latitud</th>
                                    <th>Longitud</th>
                                    <th>Dueño</th>
                                    <th>Descripcion</th>
                                    <th>Costo</th>
                                    <th>Editar</th>
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
                                                <td>{{$propiedad->latitud}}</td>
                                                <td>{{$propiedad->longitud}}</td>
                                                <td>{{$propiedad->id_dueno}}</td>
                                                <td>{{$propiedad->descripcion}}</td>
                                                <td>{{$propiedad->costo}}</td>
                                                <td><a class="btn btn-primary btn-xs" href="{{action('PropiedadEmpleadoController@edit', $propiedad->id_propiedad)}}" ><span class="glyphicon glyphicon-pencil"></span></a></td>
                                                <!--
                                                <td>
                                                    <form action="{{action('PropiedadEmpleadoController@edit', $propiedad->id_propiedad)}}" method="post">
                                                        {{csrf_field()}}

                                                        <input name="_method" type="hidden" value="DELETE">

                                                        <button class="btn btn-danger btn-xs" type="submit"><span class="glyphicon glyphicon-trash"></span></button>
                                                    </form>
                                                </td>
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
