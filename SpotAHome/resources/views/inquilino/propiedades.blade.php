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
        width:110px;
      }
    </style>
    <form class = "form-group" method="post" action="/inquilino/propiedades">
      @csrf
      <div class="row">
        <div class="col-md-2" id="estilo1">
          <br>
          <div class="form-group" >
            <button type="submit" class="btn btn-primary" >Buscar</button>
            <br>
            <label>Precio Min</label>
            <select class="form-control" id="sel1" name="min">

              <option>0</option>
              <option>500</option>
              <option>1000</option>
              <option>1500</option>
              <option>2000</option>
            </select>
          </div>

          <div class="form-group">
            <label>Precio Max</label>
            <select class="form-control" id="sel1" name="max">

              <option>2500</option>
              <option>2000</option>
              <option>1500</option>
              <option>1000</option>
              <option>500</option>
            </select>

          </div>
          <select class="form-control" id="sel1" name="ciudad">

            <option>La Paz</option>
            <option>Cochabamba</option>
            <option>Santa Cruz</option>
          </select>
          <br><br>
        </div>
        <div class="col-md-1"></div>
        <div class="col-md-8" id="estilo1">
          <div class="ibox float-e-margins">
              <div class="ibox-content">
                  <div class="table-responsive-sm">
                      <table class="table table-striped table-bordered table-hover dataTables-example table-responsive">
                          <thead>

                          </thead>
                          <tbody>
                          @if($propiedad->count())
                              @foreach($propiedad as $key=>$prop)

                                  <tr>
                                    <th width="150">
                                      @foreach ($multimedia as $multi)
                                        <img src="{{ $multi->uri }}" width='250'>
                                      @endforeach
                                    </th>
                                    <th rowspan="2" colspan="2" width="400">{{$prop->descripcion}}</th>
                                  </tr>
                                  <tr>
                                    <td>{{$prop->ciudad}}</td>
                                  </tr>
                                  <tr>
                                    <td>{{$prop->zona}}</td>
                                    <td ><h3>{{$prop->costo}} Bs.</h3></td>
                                    <td align="center">
                                      <button type="button" class="btn btn-primary"
                                        onclick="window.location='{{ action('InquilinoController@getPropiedad', $prop->id_propiedad) }}'">
                                        <i class="fas fa-eye">Ver</i>
                                    </td>
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

              </div>
        </div>
      </div>


    </div>
  </form>


@endsection
