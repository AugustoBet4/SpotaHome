@extends('layouts.app_duenos')

@section('title', 'Propiedades')

@section('content')
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <section class="content">
                <div class="col-md-10 col-md-offset-1">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="pull-left"><h1>Tus Datos Personales</h1></div>
                            <div class="col-sm-4">
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
                                    @if($duenos->count())
                                        @foreach($duenos as $dueno)
                                            <tr>
                                                <td>{{$dueno->nombre}}</td>
                                                <td>{{$dueno->apellidos}}</td>
                                                <td>{{$dueno->email}}</td>
                                                <td>{{$dueno->telefono}}</td>
                                                <td>{{$dueno->usuario}}</td>
                                                <td><a class="btn btn-primary btn-xs" href="{{action('DuenoController@edit', $dueno->id_dueno)}}" ><span class="glyphicon glyphicon-pencil"></span></a></td>

                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="8">No hay registro !!</td>
                                        </tr>
                                    @endif
                                    </tbody>

                                </table>
                                {!! $duenos->render() !!}
                            </div>

                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
