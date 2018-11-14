@extends('layouts.app_duenos')

@section('title', 'Respuesta a una consulta')

@section('content')
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="text-center">
                    <h1>
                        Responde la consulta
                    </h1>
                </div>
            </div>
        </div>
    </div>

    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="panel-body">
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ action('ConsultaController@update', $consulta->id_consultas) }}" role="form">
                        {{ csrf_field() }}

                        <div class="form row">
                            <input type="hidden" name="_method" value="PUT">
                            <input type="hidden" name="id_propiedad" class="form-control input-sm" id="id_propiedad"
                                   value="{{  $consulta->id_propiedad }}">
                            <input type="hidden" name="id_inquilino" class="form-control input-sm" id="id_inquilino"
                                   value="{{ $consulta->id_inquilino }}">
                            <input type="hidden" name="id_dueno" class="form-control input-sm" id="id_dueno"
                                   value="{{ $consulta->id_dueno }}">
                            <input type="hidden" name="estado" class="form-control input-sm" id="estado"
                                   value="ATENTIDO">
                            <div class="form-group">
                                <label for="consulta">Consulta: </label>
                                <input type="text" name="consulta" class="form-control input-sm" id="consulta" value="{{ $consulta->consulta }}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="consulta">Respuesta: </label>
                                <input type="text" name="respuesta" class="form-control input-sm" id="respuesta" required>
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <input type="submit" value="Responder" class="btn btn-success ">
                            <button type="button" class="btn btn-danger" onclick="window.location='{{ url('duenos/consultas') }}'">Cancelar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection