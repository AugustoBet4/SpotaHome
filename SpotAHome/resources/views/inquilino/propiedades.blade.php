@extends('layouts.app_inquilino')

@section('title', 'Propiedades')

@section('content')
  <div class="wrapper wrapper-content animated fadeInRight">
    <!--<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&key=AIzaSyA6AbAstj5mJZj4VmVvWK1pvVZnPmmjIzU"></script>-->
    <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
    <!-- Latest compiled and minified CSS -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    
    <script src="https://unpkg.com/gijgo@1.9.11/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.11/css/gijgo.min.css" rel="stylesheet" type="text/css" />
    
            
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
        width:125px;
      }
      .form-control1
      {
        display:block;
        height:35px;
        width:140px;
      }
    </style>
    
    <form class = "form-group" method="post" action="/inquilino/propiedades">
      @csrf
      <table class="table table-striped table-bordered table-hover dataTables-example table-responsive">
        <div class="row">
          <div class="col">
          <tr> 
            </div>
            <div class="col">
              <td> 
                <label>Precio Min</label>
                <select class="form-control" id="sel1" name="min" value="{{request('min')}}">
                  <option>0</option>
                  <option>500</option>
                  <option>1000</option>
                  <option>1500</option>
                  <option>2000</option>
                </select>
              </td>
            </div>
            <div class="form-group">
              <td> 
                <label>Precio Max</label>
                <select class="form-control" id="sel1" name="max">
                  <option>2500</option>
                  <option>2000</option>
                  <option>1500</option>
                  <option>1000</option>
                  <option>500</option>
                </select>
              </td>  
            </div>
            <td>
              <label>Ciudad</label>
              <select class="form-control" id="sel1" name="ciudad">
                <option>La Paz</option>
                <option>Cochabamba</option>
                <option>Santa Cruz</option>
              </select>
            </td>  
            <div class="form-group">
              <td>
                <label for="">Fecha de Entrada</label>
                <input  id='startDate' width="200" name="startDate"  value="{{request('startDate')}}"/>
                
              </td>
            </div> 
            <div class="form-group">
              <td>
                <label>Fecha de Salida</label>
                <input  id='endDate' width="200" name="endDate"  value="{{request('endDate')}}"/>
               
              </td>
            </div>
            <div class="form-group" >
              <td>
                <br>
                <button type="submit" class="btn btn-primary" >Buscar</button>
              </td>
            </div> 
          </tr>
        </div> 
      </table>
      <script>
        var today = new Date(new Date().getFullYear(), new Date().getMonth(), new Date().getDate());
        $('#startDate').datepicker({
            format: 'yyyy-mm-dd',
            
            minDate: today,
            maxDate: function () {
                return $('#endDate').val();
            }
        });
        $('#endDate').datepicker({
          format: 'yyyy-mm-dd',
            
            minDate: function () {
                return $('#startDate').val();
            }
        });
    </script>
      <div class="row">  
        <div class="col-md-8" id="estilo1">
          <div class="ibox float-e-margins">
              <div class="ibox-content">
                  <div class="table-responsive-sm">
                      <table class="table table-striped table-bordered table-hover dataTables-example table-responsive">
                          <tbody>
                          @if($propiedad->count())
                              @foreach($propiedad as $key=>$prop)
                                @foreach ($fechas as $fecha)  
                                  @if($fecha->id_propiedad == $prop->id_propiedad)  
                                    <tr>
                                      <th width="150">
                                        @foreach ($multimedia as $multi)
                                          @if($multi->id_propiedad == $prop->id_propiedad)
                                            <img src="{{ URL::to('/uploads/' . $multi->uri) }}" width='250'>
                                          @endif
                                        @endforeach
                                      </th>
                                      <th rowspan="1" colspan="2" width="400">{{$prop->descripcion}}</th>
                                      
                                    </tr>
                                    
                                    <tr>
                                      <td>{{$prop->ciudad}}</td>
                                      
                                      <td>
                                        <h4>
                                          Fecha de Inicio: 
                                          
                                            @if($fecha->id_propiedad == $prop->id_propiedad)
                                              
                                              {{$fecha->fecha_inicio}}
                                              
                                            @endif
                                          
                                        </h4> 
                                      </td>
                                      <td>
                                        <h4>
                                          Fecha Limite: 
                                          
                                              {{$fecha->fecha_fin}}
                                          
                                        </h4> 
                                      </td>
                                    </tr>
                                    <tr>
                                      <td>{{$prop->zona}}</td>
                                      <td ><h3>{{$prop->costo}} Bs.</h3></td>
                                      <td align="center">
                                        <button type="button" class="btn btn-primary"
                                          onclick="window.location='{{ action('InquilinoController@getPropiedad', $prop->id_propiedad) }}'">
                                          <i class="far fa-eye">Ver</i>
                                      </td>
                                    </tr>
                                  @endif  
                                @endforeach
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


    
  </form>


@endsection
