@extends('layout')

@section('content')
    <div class="col-sm-8">
        <h2>
            Editar Dueno
            <a href="{{ route('duenos.index') }}" class="btn btn-default pull-right">Listado</a>
        </h2>

        @include('duenos.fragmento.error')

        {!! Form::model($dueno, ['route' => ['duenos.update', $dueno->id_duenos],'method'=> 'PUT']) !!}
        @include('duenos.fragmento.form')
        {!! Form::close() !!}
    </div>

    <div class="col-sm-4">
        @include('duenos.fragmento.aside')
    </div>

@endsection