@extends('layouts.app_empleado')

@section('title', 'Inicio de Empleado')

@section('content')
    <div class="wrapper wrapper-content animated fadeInRight">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center m-t-lg">
                            <h1>
                                ¡Bienvenido! <br>
                                Plataforma Admin
                            </h1>
                            <small>
                                Pagina de inicio del Admin
                            </small>
                        </div>
                    </div>
                    <div align="center">
                        <img src="img/logospotahome.png"/>
                    </div>
                    <br><br>
                    <div align="center">
                        <img src={!! asset('img/equipospotahome.jpg') !!}" >
                    </div>
                </div>

            </div>
@endsection
