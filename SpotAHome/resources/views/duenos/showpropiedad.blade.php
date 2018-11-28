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
                                <h>Fechas Disponibles:</h> del {{$fechas->fecha_inicio}} al {{$fechas->fecha_fin}}<br></p>
                                @endif
                                <h3>Descripci&oacute;n</h3>
                                <p>{{$propiedad->descripcion}}</p><br>
                            <h3>Fotograf&iacute;a</h3>
                                <br>
                                @if (empty($multimedia->uri))
                                    <div class="panel-body">
                                        <h1> No Subiste fotografia</h1>
                                    </div>
                                @else
                                <img width="500px" height="300px" src="{{ URL::to('/uploads/' . $multimedia->uri) }}"/>
                                @endif
                            </div>
                            <h3>Video</h3>
                            <br>
                            @if (empty($multimedia->youtube))
                                <div class="panel-body">
                                    <h1> No Agregaste Enlace</h1>
                                </div>
                            @else
                                <iframe width="500" height="300" src="{{$multimedia->youtube}}" ></iframe>
                            @endif
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>

@endsection