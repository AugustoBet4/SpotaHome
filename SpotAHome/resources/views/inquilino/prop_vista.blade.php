@extends('layouts.app_inquilino')

@section('title', 'Busqueda')

@section('content')
  <div class="wrapper wrapper-content animated fadeInRight">
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&key=AIzaSyCCl8pKiQLLBFsI7nPksLDg-kahkBAyBtk"></script>


    <script type="text/javascript">var centreGot = false;</script>
    {!!$map['js']!!}
    <style type="text/css">
    .form-control
    {
      display:block;
      height:35px;
      width:250px;
    }


    </style>

    <div class="text-center m-t-lg">
    </div>
      <div class="centrar">
        <form method="POST" action="{{ action('ConsultaController@store') }}" role="form">
          <div class="row">
            <br>
            <div class="col-md-6">
              <img src="https://img.elcomercio.pe/files/ec_article_multimedia_gallery/uploads/2017/03/21/58d17dd823f81.jpeg" width='500'>
              <br><br>
              <h2>Ubicacion</h2>
              {!!$map['html']!!}
            </div
            <div class="col-md-3">

                  {{ csrf_field() }}

                  <div class="form row">


                        <h2><b>{{ $propiedad->direccion}}</h3></b></h2>

                        <h4>{{ $propiedad->ciudad}}&nbsp;&nbsp;{{ $propiedad->zona}}</h4>
                        <br><br>
                        <h4>{{ $propiedad->descripcion}}</h4>
                        <h1>Bs.{{ $propiedad->costo}}</h1>
                        <br><br>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Reservar</button>
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
                      <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>

                  </div>
                  <div class="modal-body">


                          <form method="POST" action="{{ action('ValoracionPropiedadController@store') }}" role="form">
                              {{ csrf_field() }}

                              <div class="form row">
                                <div  class="col-md-12">
                                  <input type="hidden" name="id_propiedad" class="form-control input-sm" id="id_propiedad">
                                  <input type="hidden" name="id_inquilino" class="form-control input-sm" id="id_inquilino">
                                  <label for="puntuacion">Fecha de Inicio: </label>
                                  <input type="date" name="puntuacion" class="form-control input-sm" id="puntuacion"  required>
                                  <div class="form-group">
                                      <label for="comentario">Fecha Final: </label>
                                      <input type="date" name="comentario" class="form-control input-sm" id="comentario"  required>
                                  </div>
                                </div>
                              </div>

                              <div class="form-group col-md-6">
                                  <input type="submit" value="Guardar" class="btn btn-success">
                                  <button type="button" class="btn btn-white" data-dismiss="modal">Cerrar</button>
                                  <br>
                              </div>
                          </form>
                  </div>
                  <div class="modal-footer">
                      <br>
                  </div>
              </div>
          </div>
      </div>

@endsection
