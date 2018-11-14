@extends('layouts.app_duenos')

@section('title', 'Inicio de Empleado')

@section('content')
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <section class="content">
                <div class="col-md-10 col-md-offset-2">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <a href="{{action('PropiedadDuenoController@create')}}" class="btn btn-success btn-block">Agregar Propiedad</a>
                            <div class="pull-left"><h1>Listado de Propiedades</h1></div>
                            <div class="col-sm-4">
                            </div>
                            <div class="table-container">
                                <table class="table table-hover table-striped">
                                    <thead>
                                    <tr>
                                        <th width="250px">Direccion</th>
                                        <th width="150px">Ciudad</th>
                                        <th width="80px">Zona</th>
                                        <th width="80px">Costo</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($propiedades as $propiedad)
                                        <tr>
                                            <td>{{$propiedad->direccion}}</td>
                                            <td>
                                                <strong>
                                                    {{$propiedad->ciudad}}
                                                </strong>
                                            </td>
                                            <td>
                                                <strong>
                                                    {{$propiedad->zona}}
                                                </strong>
                                            </td>

                                            <td>{{$propiedad->costo}}</td>
                                            <td>
                                                <a href="#" class="btn btn-link">Ver</a>
                                            </td>
                                            <td>
                                                <a href="{{action('PropiedadDuenoController@edit', $propiedad->id_propiedad)}}" class="btn btn-link">Editar</a>
                                            </td>
                                            <td>
                                                <a href="{{action('PropiedadFechasController@edit', $propiedad->id_propiedad)}}" class="btn btn-link">Editar fechas</a>
                                            </td>
                                            <td>
                                                <form action="#" method="post">
                                                    {{csrf_field()}}
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <button class="btn btn-link">Borrar</button>
                                                </form>
                                            </td>

                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                {!! $propiedades->render() !!}
                            </div>

                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
    </div>


@endsection