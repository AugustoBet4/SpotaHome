@extends('layouts.app_duenos')

@section('title', 'Crear Propiedad')

@section('content')

<style>
#myMap {
 height: 350px;
 width: 680px;
}
</style>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAv_Nsw2rI4L7szqzr37l_76Dy1GM2KBRI&libraries=places">
</script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js">
</script>
<script type="text/javascript">
var map;
var marker;
var myLatlng = new google.maps.LatLng(-16.563247,-68.099965);
var geocoder = new google.maps.Geocoder();
var infowindow = new google.maps.InfoWindow();
function initialize(){
var mapOptions = {
zoom: 18,
center: myLatlng,
mapTypeId: google.maps.MapTypeId.ROADMAP
};

map = new google.maps.Map(document.getElementById("myMap"), mapOptions);

marker = new google.maps.Marker({
map: map,
position: myLatlng,
draggable: true
});



/*google.maps.event.addListener(marker, 'dragend', function() {

geocoder.geocode({'latLng': marker.getPosition()}, function(results, status) {
if (status == google.maps.GeocoderStatus.OK) {
if (results[0]) {
$('#direccion').val(results[0].formatted_address);
infowindow.setContent(results[0].formatted_address);
infowindow.open(map, marker);
}
}
});
});

geocoder.geocode({'latLng': myLatlng }, function(results, status) {
if (status == google.maps.GeocoderStatus.OK) {
if (results[0]) {
$('#latitud,#longitud').show();
$('#direccion').val(results[0].formatted_address);
infowindow.setContent(results[0].formatted_address);
infowindow.open(map, marker);
}
}
});*/

var searchBox = new google.maps.places.SearchBox(document.getElementById('searchmap'));
google.maps.event.addListener(searchBox,'places_changed', function(){
  var places = searchBox.getPlaces();
  var bounds = new google.maps.LatLngBounds();
  var i, place;
  for(i=0; place=places[i];i++){
    bounds.extend(place.geometry.location);
    marker.setPosition(place.geometry.location);
  }
  map.fitBounds(bounds);
  map.setZoom(15);
});

google.maps.event.addListener(marker, 'position_changed',function(){
  var lat = marker.getPosition().lat();
  var long = marker.getPosition().lng();
  $('#latitud').val(lat);
  $('#longitud').val(long);
});


}
google.maps.event.addDomListener(window, 'load', initialize);

</script>

    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <strong>Error!</strong> Revise los campos obligatorios.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="text-center m-t-lg">
                    <h1>
                       SpotaHome Bolivia
                    </h1>
                </div>
                <form action="/propiedades" method="POST" role="form" enctype="multipart/form-data" id="prop-form">
                    {{ csrf_field() }}
                    <legend>Registrate Tu Vivienda</legend>
                    <div class="form-group">
                        <div id="myMap"></div>
                        <label for="">Localiza tu vivienda en el Mapa</label>
                        <!--input type="text" id="searchmap" value="" class="form-control"-->
                    </div>


                    <div class="form-group">
                        <label for="">Direccion</label>
                        <input required value="{{old('direccion')}}" type="text" class="form-control" name="direccion" id="direccion" placeholder="Dir. Vivienda / Av. Ejemplo Esq. Ejmplo">
                    </div>
                    <div class="form-group">
                        <label for="">Ciudad</label>
                        <select class="select2_demo form-control" id="ciudad" name="ciudad">
                            <option value="La Paz">La Paz</option>
                            <option value="Santa Cruz">Santa Cruz</option>
                            <option value="Cochabamba">Cochabamba</option>
                            <option value="Tarija">Tarija</option>
                            <option value="Potosi">Potosi</option>
                            <option value="Oruro">Oruro</option>
                            <option value="Sucre">Sucre</option>
                            <option value="Beni">Beni</option>
                            <option value="Pando">Pando</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Zona</label>
                        <input required type="text" value="{{old('zona')}}" class="form-control" name="zona" id="zona" placeholder="Zona de la Vivienda">
                    </div>
                    <div class="form-group">
                        <label for="">Latitud</label>
                        <input readonly required value="{{old('latitud')}}"  type="text" class="form-control" name="latitud" id="latitud" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="">Longitud</label>
                        <input readonly required value="{{old('longitud')}}"  type="text" class="form-control" name="longitud" id="longitud" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="">Costo</label>
                        <input required value="{{old('costo')}}" type="number" class="form-control" name="costo" id="costo" placeholder="Precio">
                    </div>
                    <div class="form-group">
                        <label for="">Fecha Inicio Disponible</label>
                        <input required value="{{old('fecha_inicio')}}" type="date" class="form-control" name="fecha_inicio" id="fecha_inicio">
                    </div>
                    <div class="form-group">
                        <label for="">Fecha Fin Disponible</label>
                        <input required value="{{old('fecha_fin')}}"  type="date" class="form-control" name="fecha_fin" id="fecha_fin">
                    </div>
                    <div class="form-group">
                        <label for="">Estadia Maxima en Meses</label>
                        <input value="1" required value="{{old('estadia_max')}}" min="1" type="number" class="form-control" name="estadia_max" id="estadia_max">
                    </div>
                    <div class="form-group">
                        <label for="">Descripci&oacute;n</label>
                        <textarea value="{{old('descripcion')}}" type="date" class="form-control" name="descripcion" id="descripcion" placeholder="Descripcion"></textarea>
                        <input type="number" class="hidden" name="id_dueno" id="id_dueno" value="{{$user->id_dueno}}">
                    </div>
                    <div class="form-group">
                        <label for="">Agrega Imagenes</label>
                        <input accept="image/*" type="file" class="-file-photo-o" name="imagen" id="imagen">
                    </div>
                    <button type="submit"  class="btn btn-primary">Crear</button>
                </form>
            </div>
        </div>

        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>

        <script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>
        {!! JsValidator::formRequest('App\Http\Requests\PropiedadRequest','#prop-form'); !!}



    </div>
@endsection
