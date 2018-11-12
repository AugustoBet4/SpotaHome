@extends('layouts.app_inquilino')

@section('title', 'Propiedades')

@section('content')
  <div class="wrapper wrapper-content animated fadeInRight">
    <!--<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&key=AIzaSyA6AbAstj5mJZj4VmVvWK1pvVZnPmmjIzU"></script>-->

    <script type="text/javascript">var centreGot = false;</script>
    <style>
      #estilo1
      {
        color:#000000;
        background:#FFFFFF;
      }
      .form-control
      {
        display:block;
        height:35px;
        width:80px;
      }
    </style>

    <div class="row">
      <div class="col-md-2" id="estilo1">
        <br>
        <div class="form-group" >
          <label>Precio Min</label>
          <select class="form-control" id="sel1">
            <option>0</option>
            <option>500</option>
            <option>1000</option>
            <option>1500</option>
            <option>2000</option>
          </select>
        </div>
        <div class="form-group">
          <label>Precio Max</label>
          <select class="form-control" id="sel1">

            <option>500</option>
            <option>1000</option>
            <option>1500</option>
            <option>2000</option>
            <option>2500</option>
          </select>

        </div>
      </div>
      <div class="col-md-1"></div>
      <div class="col-md-9" id="estilo1">
        <div class="ibox float-e-margins">
            <div class="ibox-content">
                <div class="table-responsive-sm">
                    <table class="table table-striped table-bordered table-hover dataTables-example table-responsive">
                        <thead>
                        <tr>
                            <th>Nro.</th>
                            <th>Ciudad</th>
                            <th>Zona</th>
                            <th>Descripcion</th>
                            <th>Costo</th>

                        </tr>
                        </thead>
                        <tbody>
                        @if($propiedad->count())
                            @foreach($propiedad as $key=>$prop)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$prop->ciudad}}</td>
                                    <td>{{$prop->zona}}</td>
                                    <td>{{$prop->descripcion}}</td>
                                    <td>{{$prop->costo}}</td>
                                    <!--<td><a class="btn btn-warning" href="{{action('InquilinoController@busqueda_prop', $prop->id_propiedad)}}" ></a></td>-->

                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="12" class="text-center">
                                </td>
                            </tr>
                        @endif
                        </tbody>
                    </table>
                </div>
                {{ $propiedad->links() }}
            </div>
      </div>
    </div>


  </div>


@endsection
