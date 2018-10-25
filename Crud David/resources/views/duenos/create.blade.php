@extends('layout')

@section('content')
    <div class="col-sm-8">
        <h2>
            Nuevo Dueno
            <a href="{{ route('duenos.index') }}" class="btn btn-default pull-right">Listado</a>
        </h2>

        @include('duenos.fragmento.error')

        {!! Form::open(['route' => 'duenos.store']) !!}
        @include('duenos.fragmento.form')
        {!! Form::close() !!}
    </div>

    <div class="col-sm-4">
        @include('duenos.fragmento.aside')
    </div>

@endsection