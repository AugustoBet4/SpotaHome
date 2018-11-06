@extends('layouts.app')
@section('content')
    <div class="card">
        <h2 class="card-header">
            Editar Fecha Disponible
        </h2>
        <div class="card-body">
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>Error!</strong> Revise los campos obligatorios.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if(Session::has('success'))
                <div class="alert alert-info">
                    {{Session::get('success')}}
                </div>
            @endif

            <form method="POST" action="{{ route('fechas.update',$fechas->id_fecha_disponibles) }}"  role="form">
                {{ csrf_field() }}
                <input name="_method" type="hidden" value="PATCH">

                <div class="form row">
                    <div class="form-group col-md-6">
                        <label for="fecha_inicio">Fecha Inicio</label>
                        <input type="date" name="fecha_inicio" class="form-control input-sm" id="fecha_inicio" value="{{$fechas->fecha_inicio }}">
                    </div>

                    <div class="form-group col-md-6">
                        <label for="fecha_fin">Fecha Fin</label>
                        <input type="date" name="fecha_fin" class="form-control input-sm" id="fecha_fin" value="{{ $fechas->fecha_fin }}">
                    </div>
                </div>

                <div class="form-group">
                    <input type="submit" value="Actualizar" class="btn btn-success">
                    <a href="{{ route('fechas.index') }}" class="btn btn-link" >Volver al listado</a>
                </div>
            </form>
        </div>
    </div>

@endsection