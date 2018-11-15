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



                  </div>


            </div>
          </div>
        </form>
      </div>

@endsection
