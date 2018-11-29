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
                            <h3 class="panel-title">Edicion de propiedad</h3>
                        </div>
                        <div class="panel-body">
                            <div class="table-container">
                                <form method="POST" action="{{ action('PropiedadEmpleadoController@update',$propiedades->id_propiedad) }}"  role="form">
                                    {{ csrf_field() }}
                                    <input name="_method" type="hidden" value="PATCH">
                                    <div class="row">
                                        <div class="col-xs-6 col-sm-6 col-md-6">
                                            <div class="form-group">
                                                <input type="text" name="direccion" id="direccion" class="form-control input-sm" value="{{$propiedades->direccion}}">
                                            </div>
                                        </div>
                                        <div class="col-xs-6 col-sm-6 col-md-6">
                                            <div class="form-group">
                                                <input type="text" name="ciudad" id="ciudad" class="form-control input-sm" value="{{$propiedades->ciudad}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-6 col-sm-6 col-md-6">
                                            <div class="form-group">
                                                <input type="text" name="latitud" id="latitud" class="form-control input-sm" value="{{$propiedades->latitud}}">
                                            </div>
                                        </div>
                                        <div class="col-xs-6 col-sm-6 col-md-6">
                                            <div class="form-group">
                                                <input type="text" name="longitud" id="longitud" class="form-control input-sm" value="{{$propiedades->longitud}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-6 col-sm-6 col-md-6">
                                            <div class="form-group">
                                                <input type="text" name="zona" id="zona" class="form-control input-sm" value="{{$propiedades->zona}}">
                                            </div>
                                        </div>
                                        <div class="col-xs-6 col-sm-6 col-md-6">
                                            <div class="form-group">
                                                <input type="text" name="costo" id="costo" class="form-control input-sm" value="{{$propiedades->costo}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-6 col-sm-6 col-md-6">
                                            <div class="form-group">
                                                <div class="form-group">
                                                    <select  class="form-control" name="id_dueno" id="id_dueno">

                                                        @foreach($duenos as $dueno)
                                                            <option value="{{ $dueno->id_dueno }}" {!! ($selected ? "selected=\"selected\"" : "") !!}> {{ $dueno->nombre }}</option>
                                                        @endforeach

                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xs-6 col-sm-6 col-md-6">
                                            <div class="form-group">
                                                <input type="text" name="estadia_max" id="estadia_max" class="form-control input-sm" value="{{$propiedades->estadia_max}}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <textarea name="descripcion" id="descripcion" class="form-control input-sm"  placeholder="Descripcion">{{$propiedades->descripcion}}</textarea>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-6 col-sm-6 col-md-6">
                                            <input type="submit"  value="Actualizar" class="btn btn-success btn-block">
                                        </div>
                                        <div class="col-xs-6 col-sm-6 col-md-6">
                                            <a href="{{ route('empleados.propiedad.index') }}" class="btn btn-info btn-block" >Atrás</a>
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
