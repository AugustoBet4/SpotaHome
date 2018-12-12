@extends('layouts.app_inquilino')

@section('title', 'Perfil')

@section('content')

    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <section class="content">
                <div class="col-md-12 col-md-offset-0">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="col-md-6">
                                <STRONG>Nombre:</STRONG> {{$user->nombre}}<BR>
                                <STRONG> Apellido:</STRONG> {{$user->apellidos}}<BR>
                            <STRONG> Correo Electronico:</STRONG> {{$user->email}}<BR>
                            <STRONG> Telefono:</STRONG> {{$user->telefono}}<BR>
                            <STRONG> Fecha de Nacimiento:</STRONG> {{$user->fecha_nacimiento}}<BR>
                            <STRONG> Genero:</STRONG> {{$user->genero}}<BR>
                            <STRONG> Nacionalidad:</STRONG> {{$user->nacionalidad}}<BR>
                            </div>
                            <div class="col-md-6">
                                FOTO

                            </div>

                    </div>
                </div>
                </div>
            </section>
        </div>
    </div>

@endsection