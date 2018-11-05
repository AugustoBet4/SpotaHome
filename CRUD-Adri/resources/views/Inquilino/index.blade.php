<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1, user-scalable=yes">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container-fluid" style="margin-top: 100px">

    @yield('content')
</div>
<style type="text/css">
    .table {
        border-top: 2px solid #ccc;

    }
</style>

@extends('layouts.layout')
@section('content')
    <div class="row">
        <section class="content">
            <div class="col-xs-12 col-sm-12 col-md-12" align="centers">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="pull-left"><h3>Lista Inquilinos</h3></div>
                        <div class="pull-right">
                            <div class="btn-group">
                                <a href="{{ route('inquilino.create') }}" class="btn btn-info" >Añadir Inquilino</a>
                            </div>
                        </div>
                        <div class="table-container">
                            <table id="mytable" class="table table-bordred table-striped">
                                <thead>
                                <th>Nombre</th>
                                <th>Email</th>
                                <th>Telefono</th>
                                <th>Fecha de Nacimiento</th>
                                <th>Genero</th>
                                <th>Nacionalidad</th>
                                <th>Usuario</th>
                                <th>Contraseña</th>
                                </thead>
                                <tbody>
                                @if($inquilinos->count())
                                    @foreach($inquilinos as $inquilino)
                                        <tr>
                                            <td>{{$inquilino->nombre}}</td>
                                            <td>{{$inquilino->email}}</td>
                                            <td>{{$inquilino->telefono}}</td>
                                            <td>{{$inquilino->fecha_nacimiento}}</td>
                                            <td>{{$inquilino->genero}}</td>
                                            <td>{{$inquilino->nacionalidad}}</td>
                                            <td>{{$inquilino->usuario}}</td>
                                            <td>{{$inquilino->contraseña}}</td>
                                            <td><a class="btn btn-primary btn-xs" href="{{action('InquilinoController@edit', $inquilino->id_inquilinos)}}" ><span class="glyphicon glyphicon-pencil"></span></a></td>
                                            <td>
                                                <form action="{{action('InquilinoController@destroy', $inquilino->id_inquilinos)}}" method="post">
                                                    {{csrf_field()}}
                                                    <input name="_method" type="hidden" value="DELETE">

                                                    <button class="btn btn-danger btn-xs" type="submit"><span class="glyphicon glyphicon-trash"></span></button></form>
                                            </td>
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
@endsection

</body>
</html>
