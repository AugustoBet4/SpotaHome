@extends('layouts.app_duenos')

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
                            <div class="form-group">
                            <h3>
                                {{$propiedad->direccion}}
                            </h3>
                            <h3>
                                {{$propiedad->zona}}
                            </h3>
                            <a href="{{action('PropiedadDuenoController@edit', $propiedad->id_propiedad)}}" class="btn btn-default pull-right">Editar</a>
                            <p>
                                <h>Ciudad:</h> {{$propiedad->ciudad}}<br>
                                <h>Latitud:</h>  {{$propiedad->latitud}}<br>
                                <h>Longitud:</h>  {{$propiedad->longitud}}<br>
                                <h>Costo:</h> {{$propiedad->costo}}<br>
                                <h>Fechas Disponibles:</h> del {{$fechas->fecha_inicio}} al {{$fechas->fecha_fin}}<br>
                            </p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>

@endsection