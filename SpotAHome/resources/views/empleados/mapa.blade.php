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
                        <head>
                            <script type='text/javascript'>
                                var centreGot = false;
                            </script>
                           {{$map['js']->mapa}}
                        </head>
                        <body>
                        {{$map['html']->mapa}}
                        </body>
                    </div>
                </div>

            </div>
@endsection
