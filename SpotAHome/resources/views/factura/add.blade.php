@extends('layouts.app_inquilino')

@section('title', 'Compra de lugar')

@section('content')
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <section class="content">
                <div class="col-md-10 col-md-offset-2">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="pull-left"><h1>Listado de Propiedades</h1></div>
                            <div class="col-sm-4">
                            </div>
                            <div class="table-container">
                                <table class="table table-hover table-striped">
                                    <thead>
                                    <tr>
                                        <th width="20px">ID</th>
                                        <th width="250px">Direccion</th>
                                        <th width="250px">Ciudad</th>
                                        <th width="250px">Costo</th>
                                        <th width="250px"></th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($prop as $propi)
                                        <tr>
                                            <td>{{$propi->id_propiedad}}</td>
                                            <td>
                                                <strong>
                                                    {{$propi->direccion}}
                                                </strong>
                                            </td>
                                            <td>
                                                <strong>
                                                    {{$propi->ciudad}}
                                                </strong>
                                            </td>

                                            <td>{{$propi->costo}}</td>
                                            <td>
                                                <a href="{{action('FacturaController@datos2', $propi->id_propiedad)}}" class="btn btn-link">Reservar</a>
                                            </td>

                                        </tr>
                                    @endforeach
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