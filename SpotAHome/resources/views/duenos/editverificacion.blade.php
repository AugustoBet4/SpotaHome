@extends('layouts.app_duenos')

@section('title', 'Editar Propiedad')

@section('content')




<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <section class="content">
            <div class="col-md-12">
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
                @if(Session::has('success'))
                    <div class="alert alert-info">
                        {{Session::get('success')}}
                    </div>
                @endif

                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Verificar propiedad</h3>
                    </div>
                    <div class="panel-body">
                        <div class="table-container">
                            <form method="post" action="{{action('VerificarPropiedadController@store')}}"  role="form">
                                {{ csrf_field() }}
                                <input name="_method" type="hidden" value="PATCH">
                                <div class="row">
                                    <div class="col-xs-6 col-sm-6 col-md-6">

                                        <div class="form-group">
                                            <label for="" class="col-form-label">Direccion</label>
                                            <select  class="form-control" name="id_propiedad" id="id_propiedad" >
                                                <option>Seleccione propiedad</option>
                                                @foreach($propiedades as $propiedad)
                                                    <option value="{{ $propiedad->id_propiedad }}"> {{ $propiedad->direccion }}</option>
                                                @endforeach
                                            </select> </div>
                                        <div class="form-group"></div>
                                        <div class="form-group">
                                            <label for="" class="col-form-label">Zona</label>
                                            <input type="hidden" name="observaciones" id="observaciones" class="form-control input-sm" value="Sin observaciones">
                                            <input type="hidden" name="estado" id="estado" class="form-control input-sm" value="No verificado"><input type="hidden" name="id_empleado" id="id_empleado" class="form-control input-sm" value="{{$empleado}}">
                                        </div>
                                        <div class="form-group">
                                            <h3>Fecha:</h3>
                                            <input type="date" required id='fecha' name="fecha" class="form-control input-sm"/>
                                            <br>
                                            <h3>Hora:</h3>
                                            <input type="time" required id='hora' name="hora" class="form-control input-sm" />
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        <input type="submit"  value="Verificar" class="btn btn-success btn-block">
                                    </div>
                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        <a href="{{ route('propiedad.index') }}" class="btn btn-info btn-block" >Atrás</a>
                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </section>
    </div>
</div>

<style>
    #myMap {
        height: 350px;
        width: 500px;
    }
</style>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAv_Nsw2rI4L7szqzr37l_76Dy1GM2KBRI&libraries=places">
</script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js">
</script>
<script type="text/javascript">
    var map;
    var marker;
    var lat = document.getElementById("latitud");
    var long = document.getElementById("longitud");
    var myLatlng = new google.maps.LatLng(document.getElementById("latitud").value,document.getElementById("longitud").value);
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

@endsection
