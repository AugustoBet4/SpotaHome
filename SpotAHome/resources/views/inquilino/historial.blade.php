@extends('layouts.app_inquilino')

@section('title', 'Historial de Reservas')

@section('content')
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="text-center">
                    <h1>
                        Historial de Reservas
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
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover dataTables-example" >
                                        <thead>
                                        <tr>
                                            <th>Nro.</th>
                                            <th>Fecha Inicio</th>
                                            <th>Fecha Fin</th>
                                            <th>Opciones</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            @if($historicas->count())
                                                @foreach($historicas as $key=>$historia)
                                                    <tr>
                                                        <td>{{$key+1}}</td>
                                                        <td>{{$historia->fecha_inicio}}</td>
                                                        <td>{{$historia->fecha_fin}}</td>
                                                        <td>
                                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                                                                    Deja tu comentario :D
                                                            </button>
                                                        </td>
                                                        {{--  <td>{{$reserva->propiedad->direccion}}</td>  --}}
                                                    </tr>
                                                @endforeach
                                            @else
                                                <tr>
                                                    <td colspan="12" class="text-center">No tiene reservas activas. Ve al buscador y reliza una :D</td>
                                                </tr>
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                                {{ $historicas->links() }}
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>



    <div class="modal inmodal" id="myModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content animated bounceInRight">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        Deja tu comentario :D
                </div>
                <div class="modal-body">
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                        <form method="POST" action="{{ action('ValoracionPropiedadController@store') }}" role="form">
                            {{ csrf_field() }}

                            <div class="form row">
                                <input type="hidden" name="id_propiedad" class="form-control input-sm" id="id_propiedad" value="{{ $historia->id_propiedad }}">
                                <label for="id_inquilino">Nombre: </label>
                                <input type="hidden" name="id_inquilino" class="form-control input-sm" id="id_inquilino" value="{{ $user->id_inquilino }}">
                                <label for="puntuacion">Puntuación: </label>
                                <input type="text" name="puntuacion" class="form-control input-sm" id="puntuacion" value="4">
                                <div class="form-group">
                                    <label for="comentario">Comentario: </label>
                                    <input type="text" name="comentario" class="form-control input-sm" id="comentario">
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <input type="submit" value="Guardar" class="btn btn-success">
                                <button type="button" class="btn btn-white" data-dismiss="modal">Cerrar</button>
                            </div>
                        </form>
                </div>
                <div class="modal-footer">
                    <p>Gracias por dejar tu comentario :D</p>
                </div>
            </div>
        </div>
    </div>
@endsection
