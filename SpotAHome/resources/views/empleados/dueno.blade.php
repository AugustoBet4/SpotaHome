@extends('layouts.app_empleado')

@section('title', 'Inicio de Empleado')

@section('content')
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <section class="content">
                <div class="col-md-10 col-md-offset-2">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="pull-left"><h1>Listado de due&ntilde;os</h1></div>
                            <div class="col-sm-4">
                            </div>
                                <div class="table-container">
                                    <table class="table table-hover table-striped">
                                        <thead>
                                        <tr>
                                            <th width="20px">ID</th>
                                            <th width="250px">Nombre</th>
                                            <th width="250px">Apellidos</th>
                                            <th width="250px">E-mail</th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($duenos as $dueno)
                                        <tr>
                                        <td>{{$dueno->id_dueno}}</td>
                                            <td>
                                            <strong>
                                            {{$dueno->nombre}}
                                            </strong>
                                            </td>
                                            <td>
                                                <strong>
                                                    {{$dueno->apellidos}}
                                                </strong>
                                            </td>

                                        <td>{{$dueno->email}}</td>
                                            <td>
                                                <a href="{{action('DuenoController@show', $dueno->id_dueno)}}" class="btn btn-link">Ver</a>
                                            </td>
                                            <td>
                                                <a href="{{action('DuenoController@edit', $dueno->id_dueno)}}" class="btn btn-link">Editar</a>
                                            </td>
                                            <td>
                                                <form action="{{action('DuenoController@destroy', $dueno->id_dueno)}}" method="post">
                                                    {{csrf_field()}}
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button class="btn btn-link">Borrar</button>
                                </form>
                            </td>

                        </tr>
                                @endforeach
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
