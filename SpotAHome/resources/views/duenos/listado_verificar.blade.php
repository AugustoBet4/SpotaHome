@extends('layouts.app_duenos')

@section('title', 'Propiedades')

@section('content')
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <section class="content">
                <div class="col-md-12 col-md-offset-0">
                    <div class="panel panel-default">
                        <div class="panel-body">
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
                                                <a href="{{action('VerificarPropiedadController@create', $propiedad->id_propiedad)}}" class="btn btn-link">Verificar</a>
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
