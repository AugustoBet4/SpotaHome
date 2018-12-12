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
                            <div class="form-group">
                                <h3>
                                    {{$propiedad->direccion}}
                                </h3>
                                <h3>
                                    {{$propiedad->zona}}
                                </h3> <p>
                                    <h>Ciudad:</h> {{$propiedad->ciudad}}<br>
                                    <h>Fecha homecheck:</h> {{$propiedad->fecha}}<br> Arreglarlo en tablita
                                    <h>Hora homecheck:</h> {{$propiedad->hora}}<br> Ya me dio sueño bye
                                    <h>Estado homecheck:</h> {{$propiedad->estado}}<br>Volverlo combo box

                                <h3>Fotograf&iacute;a</h3>
                                <br>
                                @if (empty($propiedad->uri))
                                    <div class="panel-body">
                                        <h1> No Subiste fotografia</h1>
                                    </div>
                                @else
                                    <img width="500px" height="300px" src="{{ URL::to('/uploads/' . $propiedad->uri) }}"/>
                                @endif
                            </div>
                            <h3>Video</h3>
                            <br>
                            @if (empty($propiedad->youtube))
                                <div class="panel-body">
                                    <h1> No Agregaste Enlace</h1>
                                </div>
                            @else
                                <iframe width="500" height="300" src="{{$propiedad->youtube}}" ></iframe>
                            @endif


                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
