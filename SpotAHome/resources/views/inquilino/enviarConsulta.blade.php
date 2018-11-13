@extends('layouts.app_inquilino')

@section('title', 'Anulacion de Reserva')

@section('content')
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="text-center">
                    <h1>
                        Deja tu Consulta
                    </h1>
                    <small>Aqui podras dejar tus consultas para la reserva que seleccionaste.</small>
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

                    <form method="POST" action="{{ action('ConsultaController@store') }}" role="form">
                        {{ csrf_field() }}

                        <div class="form row">
                            <input type="hidden" name="id_propiedad" class="form-control input-sm" id="id_propiedad"
                                   value="{{  $propiedad->id_propiedad }}">
                            <input type="hidden" name="id_inquilino" class="form-control input-sm" id="id_inquilino"
                                   value="{{ $user->id_inquilino }}">
                            <input type="hidden" name="id_dueno" class="form-control input-sm" id="id_dueno"
                                   value="{{ $propiedad->id_dueno }}">
                            <div class="form-group">
                                <label for="Nombre">Nombre: </label>
                                <input type="text" name="nombre" class="form-control input-sm" id="nombre" value="{{ $user->nombre }}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="consulta">Consulta: </label>
                                <input type="text" name="consulta" class="form-control input-sm" id="consulta" required>
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <input type="submit" value="Enviar" class="btn btn-success ">
                            <button type="button" class="btn btn-danger" onclick="window.location='{{ url('inquilino/reservas') }}'">Cancelar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection