@extends('layouts.app_empleado')

@section('title', 'Inicio de Empleado')

@section('content')
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <section class="content">
                <div class="col-md-12 col-md-offset-0">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div align="center">
                                <h1>Estadisticas</h1>
                            </div>
                            <div align="left">
                                <h1>Status de propiedades</h1>
                                <div align="center">
                                    <h3>Cantidad total de propiedades: {{$totprop}} </h3>
                                    <h3>El porcentaje de propiedades reservadas: {{$reservadas}} %</h3>
                                </div>
                                <div align="center">
                                    <h2>Propiedades reservadas a la fecha</h2>
                                    <table id="mytable" class="table table-bordred table-striped">
                                        <thead>
                                        <th>Nombre del dueño</th>
                                        <th>Nombre del inquilino</th>
                                        <th>Propiedad</th>
                                        <th>Ciudad</th>
                                        <th>Zona</th>
                                        <th>Meses de estadia maxima</th>
                                        <th>Fecha inicio</th>
                                        <th>Fecha fin</th>
                                        </thead>
                                        <tbody>
                                        @if($propiedades->count())
                                            @foreach($propiedades as $dueno)
                                                <tr>
                                                    <td>{{$dueno->nombre}}</td>
                                                    <td>{{$dueno->inqui}}</td>
                                                    <td>{{$dueno->direccion}}</td>
                                                    <td>{{$dueno->ciudad}}</td>
                                                    <td>{{$dueno->zona}}</td>
                                                    <td>{{$dueno->estadia_max}}</td>
                                                    <td>{{$dueno->fecha_inicio}}</td>
                                                    <td>{{$dueno->fecha_fin}}</td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr>
                                                <td colspan="8">No hay registro !!</td>
                                            </tr>
                                        @endif
                                        </tbody>

                                    </table>
                                </div>

                            </div>
                            <div align="left">
                                <h1>Inquilinos</h1>
                                <div align="center">
                                    <h2>Cantidad total de inquilinos: {{$totin}} </h2>
                                    <h3>Mujeres: {{$femalein}} %</h3>
                                    <h3>Hombres: {{$malein}} %</h3>
                                </div>
                            </div>
                            <div align="left">
                                <h1>Dueños</h1>
                                <div align="center">
                                    <h2>Cantidad total de dueños: {{$totdue}} </h2>
                                    <h3>Mujeres: {{$femaledue}} %</h3>
                                    <h3>Hombres: {{$maledue}} %</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection

