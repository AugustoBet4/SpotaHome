@extends('layouts.app_empleado')

@section('title', 'Inicio de Empleado')

@section('content')
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <section class="content">
                <div class="col-md-10 col-md-offset-1">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="col-sm-6">
                                <form method="post" action="{{action('AgendaPropiedadController@actualizar', $propiedad->id_verificacion_propiedad)}}">
                                <h2>Homecheck # {{$propiedad->id_verificacion_propiedad}}</h2>
                                <table width="800px" height="300px">
                                    <tr></tr>
                                    <td><b> Dirección: </b></td>
                                    <td>{{$propiedad->direccion}}</td>
                                    <tr></tr>
                                    <td><b> Ciudad: </b></td>
                                    <td>{{$propiedad->ciudad}}</td>
                                    <tr></tr>
                                    <td><b> Zona: </b></td>
                                    <td>{{$propiedad->zona}}</td>
                                    <tr></tr>
                                    <td><b> Fecha programada homecheck: </b></td>
                                    <td>{{$propiedad->fecha}}</td>
                                    <tr></tr>
                                    <td><b> Hora programada homecheck: </b></td>
                                    <td>{{$propiedad->hora}}</td>
                                    <tr></tr>
                                    <td><b> Estado homecheck: </b></td>
                                    <td>
                                        <div class="col-sm-8">
                                            <select  class="form-control" name="estado" id="estado">
                                                <option>No verificado</option>
                                                <option>Verificado</option>
                                            </select>
                                        </div>
                                    </td>
                                </table>
                                <br>
                                <div align="center" class="col-md-10 col-md-offset-6">
                                    <button type="submit" class="btn btn-primary">Verificar</button>
                                </div>
                                </form>
                                <br>
                                <table width="800px" height="300px" align="center">
                                    <tr>
                                    <td><h3>Fotografía</h3></td>
                                        <td><h3>Video</h3></td>
                                        </tr>
                                    <tr>
                                        <td>
                                            @if (empty($propiedad->uri))
                                                <div class="panel-body">
                                                    <h1> No Subiste fotografia</h1>
                                                </div>
                                            @else
                                                <img width="400px" height="200px" src="{{ URL::to('/uploads/' . $propiedad->uri) }}"/>
                                            @endif
                                        </td>
                                        <td>
                                            @if (empty($propiedad->youtube))
                                                <div class="panel-body">
                                                    <h1> No Agregaste Enlace</h1>
                                                </div>
                                            @else
                                                <iframe width="400" height="200" src="{{$propiedad->youtube}}" ></iframe>
                                            @endif
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
