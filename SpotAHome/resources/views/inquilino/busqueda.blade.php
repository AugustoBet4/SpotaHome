@extends('layouts.app_inquilino')

@section('title', 'Busqueda')

@section('content')
  <div class="wrapper wrapper-content animated fadeInRight">
    <!--<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&key=AIzaSyA6AbAstj5mJZj4VmVvWK1pvVZnPmmjIzU"></script>-->
    <script type="text/javascript">var centreGot = false;</script>
    {!!$map['js']!!}
        <div class="row">
          <div class="text-center m-t-lg">
              <h1>Busqueda</h1>
              <br>
          </div>
            <div class="col-md-6">

            </div>
            <div class="col-md-6">
              {!!$map['html']!!}
            </div>
        </div>
    </div>
@endsection
