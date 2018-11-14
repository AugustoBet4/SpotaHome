@extends('layouts.app_empleado')

@section('title', 'Inicio de Empleado')

@section('content')
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <section class="content">
                <div class="col-md-10 col-md-offset-2">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="col-sm-4">
                            </div>
                            <h2>
                                {{$dueno->nombre}}
                            </h2>
                            <h2>
                                {{$dueno->apellidos}}
                            </h2>
                            <a href="{{action('DuenoEmpleadoController@edit', $dueno->id_dueno)}}" class="btn btn-default pull-right">Editar</a>
                            <p>
                                <h>Genero:</h> {{$dueno->genero}}<br>
                                <h>Pais de Procedencia:</h>  {{$dueno->nacionalidad}}<br>
                                <h>Fecha de Nacimiento:</h>  {{$dueno->fecha_nacimiento}}<br>
                                <h>E-mail:</h> {{$dueno->email}}<br>
                                <h>Telefono:</h> {{$dueno->telefono}}<br>
                            </p>

                        </div>
                    </div>
                </div>
            </section>
            </div>
    </div>
@endsection
