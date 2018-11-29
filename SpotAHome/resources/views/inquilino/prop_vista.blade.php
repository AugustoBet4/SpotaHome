@extends('layouts.app_inquilino')

@section('title', 'Busqueda')

@section('content')
    <div class="wrapper wrapper-content animated fadeInRight">
        <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&key=AIzaSyCCl8pKiQLLBFsI7nPksLDg-kahkBAyBtk"></script>
        <script type="text/javascript">var centreGot = false;</script>
        {!!$map['js']!!}
        <style type="text/css">
            .form-control {
                display: block;
                height: 35px;
                width: 250px;
            }
        </style>
        <div class="text-center m-t-lg">
        </div>
        <div class="centrar">
            <form method="POST" action="" role="form">
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <strong>Las Fechas son invalidas</strong> <br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="row">
                    <br>
                    <div class="col-md-6">
                        @foreach ($multimedia as $multi)
                            <img src="{{ URL::to('/uploads/' . $multi->uri) }}" width='500'>
                        @endforeach
                        <br><br>
                        <h2>Ubicacion</h2>
                        {!!$map['html']!!}
                    </div>
                    
                    <div class="col-md-3">
                        {{ csrf_field() }}
                        <div class="form row">
                            <h2><b>{{ $propiedad->direccion}}</b></h2>
                            <h4>{{ $propiedad->ciudad}}&nbsp;&nbsp;{{ $propiedad->zona}}</h4>
                            <br><br>
                            <h4>{{ $propiedad->descripcion}}</h4>
                            <h4>Tiempo de Estadia Maximo: {{ $propiedad->estadia_max }} meses</h4>
                            <h1>Bs.{{ $propiedad->costo}}</h1>
                            <br><br>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                                Reservar
                            </button>
                            <br><br>
                            <h2>Video</h2>
                            @foreach ($multimedia as $multi)
                                
                                <iframe width="500" height="315" frameborder="0" allowfullscreen=""   src="{{ $multi->youtube }}">
                            @endforeach
                        </div>
                    </div>
                    
                </div>
            </form>
        </div>
        <div class="modal inmodal" id="myModal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content animated bounceInRight">
                    <div class="modal-header">
                        <b>Verifica la disponibilidad</b>
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span
                                    class="sr-only">Close</span></button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="{{ action('AlquilerController@store') }}" role="form">
                            {{ csrf_field() }}
                            <div class="form row">
                                <input type="hidden" name="id_propiedad" class="form-control input-sm" id="id_propiedad"
                                       value="{{ $propiedad->id_propiedad }}">
                                <input type="hidden" name="id_inquilino" class="form-control input-sm" id="id_inquilino"
                                       value="{{ $user->id_inquilino }}">
                                <input type="hidden" name="status_alquiler" class="form-control input-sm"
                                       id="status_alquiler" value="Reservado">
                                <input type="hidden" name="estadia" class="form-control input-sm" id="estadia">
                                <label for="fecha_inicio">Fecha de Inicio: </label>
                                <input type="date" name="fecha_inicio" class="form-control input-sm" id="fecha_inicio" required>
                                @foreach ($errors->get('fecha_inicio') as $error)
                                    <div class="alert alert-danger">
                                        <li>{{ $error }}</li>
                                    </div>
                                @endforeach
                                <div class="form-group">
                                    <label for="fecha_fin">Fecha Final: </label>
                                    <input type="date" name="fecha_fin" class="form-control input-sm" id="fecha_fin"
                                           required>
                                    @foreach ($errors->get('fecha_fin') as $error)
                                        <div class="alert alert-danger">
                                            <li>{{ $error }}</li>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <input type="submit" value="Guardar" class="btn btn-success">
                                <button type="button" class="btn btn-white" data-dismiss="modal">Cerrar</button>
                                <br>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
