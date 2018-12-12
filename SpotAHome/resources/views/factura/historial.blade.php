@extends('layouts.app_inquilino')

@section('title', 'Historial de Factura')

@section('content')
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <section class="content">
                <div class="col-md-10 col-md-offset-2">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="pull-left"><h1>Historial de Facturas</h1></div>
                            <div class="col-sm-4">
                            </div>
                            <div class="table-container">
                                <table class="table table-hover table-striped">
                                    <thead>
                                    <tr>
                                        <th width="20px">ID</th>
                                        <th width="250px">Fecha</th>
                                        <th width="250px">Codigo</th>
                                        <th width="250px">Costo</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if($y==0)
                                    @foreach($histo as $his)
                                        <tr>
                                            <td>{{ $his->id }}</td>
                                            <td>
                                                <strong>
                                                    {{ $his->fecha }}
                                                </strong>
                                            </td>
                                            <td>
                                                <strong>
                                                    {{ $his->codigo }}
                                                </strong>
                                            </td>

                                            <td>{{ $his->costo }}</td>

                                        </tr>
                                    @endforeach
                                        @else
                                        @foreach($histo2 as $his2)
                                        <tr>
                                            <td>{{ $his2->id }}</td>
                                            <td>
                                                <strong>
                                                    {{ $his2->fecha }}
                                                </strong>
                                            </td>
                                            <td>
                                                <strong>
                                                    {{ $his2->codigo }}
                                                </strong>
                                            </td>

                                            <td>{{ $his2->costo }}</td>

                                        </tr>
                                        @endforeach
                                        @endif
                                    </tbody>
                                </table>

                            </div>

                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>

    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <section class="content">
                <div class="col-md-10 col-md-offset-2">
                    <div class="panel panel-default">
                        <div class="panel-body">
                        <div class="pull-left"><h1>Filtrar por fecha</h1></div>
                            <br><br><br><br>
                            <form class="form-horizontal" role="form" method="POST" action="{{ url('/factura/hist') }}">
                                {!! csrf_field() !!}
                        <div class="col-sm-4">
                            <label for="start">Elegir Fecha: </label>
                            <input type="date" id="datef" name="datef"
                                   value="2018-12-12"
                                   min="2010-01-01" max="3018-12-31">
                        </div>
                            <div class="panel-body">

                            </div>
                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-4">

                                        <input type="hidden" name="filt" value=1>

                                        <button type="submit" class="btn btn-primary" onclick="enable()">
                                            Aplicar Filtro
                                        </button>
                                    </div>
                                </div>
                            </form>
                                <form class="form-horizontal" role="form" method="POST" action="{{ url('/factura/hist') }}">
                                    {!! csrf_field() !!}
                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-4">

                                        <input type="hidden" name="datef" value="2010-01-01">
                                        <input type="hidden" name="filt" value=0>

                                        <button type="submit" class="btn btn-primary" onclick="enable()">
                                            Quitar Filtro
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>

@endsection