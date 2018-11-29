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
                        <h3 class="panel-title">Edicion de propiedad</h3>
                    </div>
                    <div class="panel-body">
                        <div class="table-container">
                            <form method="POST" action="{{action('PropiedadDuenoController@update', $propiedades->id_propiedad)}}"  role="form">
                                {{ csrf_field() }}
                                <input name="_method" type="hidden" value="PATCH">
                                <div class="row">
                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        <div class="form-group" id="myMap">

                                        </div>
                                    </div>
                                    <div class="col-xs-6 col-sm-6 col-md-6">

                                        <div class="form-group">
                                            <label for="" class="col-form-label">Direccion</label>
                                            <input type="text" name="direccion" id="direccion" class="form-control input-sm" value="{{$propiedades->direccion}}">
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="col-form-label">Ciudad</label>
                                            <select class="select2_demo form-control" id="ciudad" name="ciudad">
                                                <option value="La Paz">La Paz</option>
                                                <option value="Santa Cruz">Santa Cruz</option>
                                                <option value="Cochabamba">Cochabamba</option>
                                                <option value="Tarija">Tarija</option>
                                                <option value="Potosi">Potosi</option>
                                                <option value="Oruro">Oruro</option>
                                                <option value="Sucre">Sucre</option>
                                                <option value="Beni">Beni</option>
                                                <option value="{{$propiedades->ciudad}}" hidden selected>{{$propiedades->ciudad}}</option>
                                                <option value="Pando">Pando</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="col-form-label">Latitud</label>
                                            <input readonly type="text" name="latitud" id="latitud" class="form-control input-sm" value="{{$propiedades->latitud}}">
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="col-form-label">Longitud</label>
                                            <input readonly type="text" name="longitud" id="longitud" class="form-control input-sm" value="{{$propiedades->longitud}}">
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="col-form-label">Estadia Maxima en Meses</label>
                                            <input type="number" name="estadia_max" id="estadia_max" class="form-control input-sm" value="{{$propiedades->estadia_max}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-6 col-sm-6 col-md-6">

                                    </div>
                                    <div class="col-xs-6 col-sm-6 col-md-6">

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <label for="" class="col-form-label">Zona</label>
                                             <input type="text" name="zona" id="zona" class="form-control input-sm" value="{{$propiedades->zona}}">

                                        </div>
                                    </div>
                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <label for="" class="col-form-label">Costo</label>
                                            <input type="text" name="costo" id="costo" class="form-control input-sm" value="{{$propiedades->costo}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-form-label">Descripcion</label>
                                    <textarea name="descripcion" id="descripcion" class="form-control input-sm"  placeholder="Descripcion">{{$propiedades->descripcion}}</textarea>
                                </div>
                                <div class="row">
                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        <input type="submit"  value="Actualizar" class="btn btn-success btn-block">
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
