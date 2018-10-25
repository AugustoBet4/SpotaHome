@extends('layouts.app')
@section('content')

    <div class="card">
        <h2 class="card-header">
            Agregar Fechas Disponible Nueva
        </h2>
        <div class="card-body">
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if(Session::has('success'))
                <div class="alert alert-info">
                    {{ Session::get('success') }}
                </div>
            @endif

            <form method="POST" action="{{ route('fechas.store') }}"  role="form">
                {{ csrf_field() }}

                <div class="form row">
                        <input type="text" name="id_propiedades" class="form-control input-sm" id="id_propiedades" value="1" hidden="true">
                    <div class="form-group col-md-6">
                        <label for="fecha_inicio">Fecha Inicio</label>
                        <input type="date" name="fecha_inicio" class="form-control input-sm" id="fecha_inicio">
                    </div>

                    <div class="form-group col-md-6">
                        <label for="fecha_fin">Fecha Fin</label>
                        <input type="date" name="fecha_fin" class="form-control input-sm" id="fecha_fin">
                    </div>
                </div>


                <div class="form-group">
                    <input type="submit" value="Guardar" class="btn btn-success">
                    <a href="{{ route('fechas.index') }}" class="btn btn-link" >Volver al listado</a>
                </div>
            </form>
        </div>

@endsection