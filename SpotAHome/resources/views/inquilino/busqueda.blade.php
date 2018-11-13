@extends('layouts.app_inquilino')

@section('title', 'Busqueda')

@section('content')
  <div class="wrapper wrapper-content animated fadeInRight">
    <!--<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&key=AIzaSyA6AbAstj5mJZj4VmVvWK1pvVZnPmmjIzU"></script>-->
    <script type="text/javascript"
      src="http://maps.googleapis.com/maps/api/js?key=AIzaSyCQWz33Gg4GvMUc0oa2-6WxJufb7wkMgYk&sensor=TRUE_OR_FALSE">
    </script>
    <script type="text/javascript">var centreGot = false;</script>
    <style type="text/css">
    .form-control
    {
      display:block;
      height:35px;
      width:250px;
    }


    </style>

    <div class="text-center m-t-lg">



      <h1>Busqueda</h1>

    </div>
      <div class="centrar">
        <br><br><br><br><br><br><br>
        <form class = "form-group" method="post" action="/inquilino/propiedades">
          @csrf
          <div class="row">

              <div class="col-md-3"></div>
              <div class="col-md-3" >
                <div class="form-group">
                  <select class="form-control" id="sel1" name="ciudad">


                    <option>La Paz</option>
                    <option>Cochabamba</option>
                    <option>Santa Cruz</option>

                  </select>
                </div>
              </div>

              <div class="col-md-3">
                <button type="submit" class="btn btn-primary" >Buscar</button>
              </div>
          </div>
        </form>
      </div>
    </div>
@endsection
