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
                Busca tu Propiedad
                <div class="ibox float-e-margins">
                    <div class="ibox-content">

                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover dataTables-example" >
                                <thead>
                                <tr>
                                    <th>Ciudad</th>
                                    <th>Direccion</th>
                                    <th>Costo</th>

                                </tr>
                                </thead>
                                <tbody>

                                @if($propiedad->count())
                                    @foreach($propiedad as $prop)
                                        <tr>
                                            <td>{{$prop->ciudad}}</td>
                                            <td>{{$reserva->direccion}}</td>
                                            <td>{{$reserva->costo}}</td>
                                        </tr>
                                    @endforeach
                                @else

                                @endif
                                </tbody>
                            </table>
                        </div>
                        {{ $propiedad->links() }}
                    </div>
                </div>
            </div>
            <div class="col-md-6">
              {!!$map['html']!!}
            </div>
        </div>
    </div>
@endsection
