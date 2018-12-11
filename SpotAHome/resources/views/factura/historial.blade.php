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
                                    </tbody>
                                </table>

                            </div>

                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>

@endsection