@extends('layouts.app_inquilino')

@section('title', 'Anulacion de Reserva')

@section('content')
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="text-center">
                    <h1>
                        Direcciones >:D
                    </h1>
                    <small>Aqui podra ver un listado historico de todas las reservas que tiene en el sistema.</small>
                </div>
            </div>
        </div>
    </div>

    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="panel-body">
                    <div class="ibox float-e-margins">
                        <div class="ibox-content">
                            Holas aqui veras en un mapa como llegar a la propiedad que reservaste :D
                            <a href="{{ $fin }}" target="_blank">{{ $fin }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
