@extends('layouts.app_inquilino')

@section('title', 'Busqueda')

@section('content')
  <div class="wrapper wrapper-content animated fadeInRight">
    <!--<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&key=AIzaSyA6AbAstj5mJZj4VmVvWK1pvVZnPmmjIzU"></script>-->
    <script type="text/javascript"
      src="http://maps.googleapis.com/maps/api/js?key=AIzaSyCQWz33Gg4GvMUc0oa2-6WxJufb7wkMgYk&sensor=TRUE_OR_FALSE">
    </script>
    <script type="text/javascript">var centreGot = false;</script>
    <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
    <!-- Latest compiled and minified CSS -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    
    <script src="https://unpkg.com/gijgo@1.9.11/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.11/css/gijgo.min.css" rel="stylesheet" type="text/css" />
    
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
        <form class = "form-group" method="post" action="{{ action('InquilinoController@busqueda_prop') }}" role="form">
          @csrf
          <div class="row">
          <input type="hidden" name="min" class="form-control input-sm" id="min" value="0" >
          <input type="hidden" name="max" class="form-control input-sm" id="max" value="2500">
            <div class="col-md-3"></div>
            <div class="col-md-6">
              <table class="table table-striped table-bordered table-hover dataTables-example table-responsive" > 
                <div class="form-group">
                  <td width="250">
                    <label for="">Fecha de Entrada</label>
                    <input  required id='startDate' width="200" name="startDate"  />
                    
                  </td>
                </div> 
                <div class="form-group">
                  <td width="250">
                    <label>Fecha de Salida</label>
                    <input   required id='endDate' width="200" name="endDate"  />
                  </td>
                </div>
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
                <div class="col-md-3">
                  <td width="250">
                    <br>
                    <button type="submit" class="btn btn-primary" >Buscar</button>
                  </td>
                </div>
              </table> 
            </div> 
          </div>
        </form>
      </div>
    </div>
@endsection
