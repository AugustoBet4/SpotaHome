@extends('layout')

@section('content')
    <div class="col-sm-8">
        <h2>
            {{$dueno->nombre}}
            <a href="{{ route('duenos.edit', $dueno->id_duenos) }}" class="btn btn-default pull-right">Editar</a>
        </h2>
        <p>
        <h>Genero:</h> {{$dueno->genero}}<br>
        <h>Pais de Procedencia:</h>  {{$dueno->nacionalidad}}<br>
        <h>Fecha de Nacimiento:</h>  {{$dueno->fecha_nacimiento}}<br>
        <h>E-mail:</h> {{$dueno->email}}<br>
        <h>Telefono:</h> {{$dueno->telefono}}<br>



        </p>

    </div>

    <div class="col-sm-4">
        @include('duenos.fragmento.aside')
    </div>

@endsection