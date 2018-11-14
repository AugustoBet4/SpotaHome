@extends('layouts.app_empleado')

@section('title', 'Inicio de Empleado')

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
                            <h3 class="panel-title">Edicion de Due&ntilde;o</h3>
                        </div>
                        <div class="panel-body">
                            <div class="table-container">
                                <form method="POST" action="{{action('DuenoEmpleadoController@update', $dueno->id_dueno)}}"  role="form">
                                    {{ csrf_field() }}
                                    <input name="_method" type="hidden" value="PATCH">
                                    <div class="row">
                                        <div class="col-xs-6 col-sm-6 col-md-6">
                                            <div class="form-group">
                                                <label for="" class="col-form-label">Nombre</label>
                                                <input type="text" name="nombre" id="nombre" class="form-control input-sm" value="{{$dueno->nombre}}">
                                            </div>
                                        </div>
                                        <div class="col-xs-6 col-sm-6 col-md-6">
                                            <div class="form-group">
                                                <label for="" class="col-form-label">Apellidos</label>
                                                <input type="text" name="apellidos" id="apellidos" class="form-control input-sm" value="{{$dueno->apellidos}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-6 col-sm-6 col-md-6">
                                            <div class="form-group">
                                                <label for="" class="col-form-label">Genero</label>
                                                <input type="text" name="genero" id="genero" class="form-control input-sm" value="{{$dueno->genero}}">
                                            </div>
                                        </div>
                                        <div class="col-xs-6 col-sm-6 col-md-6">
                                            <div class="form-group">
                                                <label for="" class="col-form-label">Nacionalidad</label>
                                                <input type="text" name="nacionalidad" id="nacionalidad" class="form-control input-sm" value="{{$dueno->nacionalidad}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-6 col-sm-6 col-md-6">
                                            <div class="form-group">
                                                <label for="" class="col-form-label">Fecha de Nacimiento</label>
                                                <input type="date" name="fecha_nacimiento" id="fecha_nacimiento" class="form-control input-sm" value="{{$dueno->fecha_nacimiento}}">
                                            </div>
                                        </div>
                                        <div class="col-xs-6 col-sm-6 col-md-6">
                                            <div class="form-group">
                                                <label for="" class="col-form-label">Corre Electronico</label>
                                                <input type="email" name="email" id="email" class="form-control input-sm" value="{{$dueno->email}}">
                                            </div>
                                        </div>
                                        <div class="col-xs-6 col-sm-6 col-md-6">
                                            <div class="form-group">
                                                <label for="" class="col-form-label">Telefono</label>
                                            <input type="text" name="telefono" id="telefono" class="form-control input-sm" value="{{$dueno->telefono}}">
                                        </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-6 col-sm-6 col-md-6">
                                            <input type="submit"  value="Actualizar" class="btn btn-success btn-block">
                                        </div>
                                        <div class="col-xs-6 col-sm-6 col-md-6">
                                            <a href="{{ url('empleados/duenos') }}" class="btn btn-info btn-block" >Atrás</a>
                                        </div>

                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
