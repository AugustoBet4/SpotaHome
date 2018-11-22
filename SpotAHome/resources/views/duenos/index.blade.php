@extends('layouts.app_duenos')

@section('title', 'Inicio de Dueno')

@section('content')
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="text-center m-t-lg">
                    <h1>
                        Bienvenido a SpotaHome
                    </h1>
                    <small>
                        Pagina de inicio del Due&ntilde;o
                    </small>
                    <p>
                        Es una placer verte de nuevo: {{$user->nombre}}
                    <p>
                </div>
            </div>
        </div>
    </div>
@endsection