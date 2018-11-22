@extends('layouts.app_duenos')

@section('title', 'Editar Fechas')

@section('content')
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <section class="content">
                <div class="col-md-12">
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

                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Edicion de Disponibilidad</h3>
                        </div>
                        @if (empty($fechas->fecha_inicio))
                            <div class="panel-body">
                                <h1> No hay registro de Fechas !!</h1>
                            </div>
                        @else
                        <div class="panel-body">
                            <div class="table-container">
                                <form method="POST" action="{{action('PropiedadFechasController@update', $fechas->id_fecha_disponibilidad)}}"  role="form">
                                    {{ csrf_field() }}
                                    <input name="_method" type="hidden" value="PATCH">
                                    <div class="row">
                                        <div class="form-group">
                                            <label for="" class="col-form-label">Fecha Inicio</label>
                                            <input type="date" name="fecha_inicio" id="fecha_inicio" class="form-control input-sm" value="{{$fechas->fecha_inicio}}">
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="col-form-label">Fecha Fin</label>
                                            <input type="date" name="fecha_fin" id="fecha_fin" class="form-control input-sm" value="{{$fechas->fecha_fin}}">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-6 col-sm-6 col-md-6">
                                            <input type="submit"  value="Actualizar" class="btn btn-success btn-block">
                                        </div>
                                        <div class="col-xs-6 col-sm-6 col-md-6">
                                            <a href="{{ route('propiedad.index') }}" class="btn btn-info btn-block" >Atrás</a>
                                        </div>

                                    </div>
                                </form>
                            </div>
                        </div>
                        @endif

                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
