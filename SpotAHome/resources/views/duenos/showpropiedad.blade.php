@extends('layouts.app_duenos')

@section('title', 'Dueno')

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
                                @if (empty($fechas->fecha_inicio))
                                    <h1>No registraste fechas</h1>
                                @else
                                <h>Fechas Disponibles:</h> del {{$fechas->fecha_inicio}} al {{$fechas->fecha_fin}}<br>
                                @endif
                            </p>
                                @if (empty($multimedia->uri))
                                    <div class="panel-body">
                                        <h1> No Subiste imagenes xd</h1>
                                    </div>
                                @else
                                <img src="{{ URL::to('/uploads/' . $multimedia->uri) }}"/>
                                @endif
                            </div>
                            <iframe width="729" height="547" src="https://www.youtube.com/embed/F4e06PWs4Es" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>

@endsection