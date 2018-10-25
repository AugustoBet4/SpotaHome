@extends('layouts.app')
@section('content')
    <div class="card">
        <h2 class="card-header">
            CRUD de Fechas Disponibles
            <div class="btn btn-link">
                <a href="{{ route('fechas.create') }}" class="btn btn-info" >Añadir Fecha de Disponibilidad</a>
            </div>
        </h2>
        <div class="card-body">
            <div class="table-container">
                <table id="mytable" class="table">
                    <thead class="thead-black">
                    <th>Fecha Inicio</th>
                    <th>Fecha Fin</th>
                    </thead>

                    <tbody>
                    @if($fechas->count())
                        @foreach($fechas as $fecha)
                            <tr>
                                <td>{{$fecha->fecha_inicio}}</td>
                                <td>{{$fecha->fecha_fin}}</td>
                                <td><a class="btn btn-warning" href="{{action('FechasController@edit', $fecha->id_fecha_disponibles)}}" ><i class="far fa-edit"></i></a></td>
                                <td>
                                    <form action="{{action('FechasController@destroy', $fecha->id_fecha_disponibles)}}" method="post">
                                        {{csrf_field()}}
                                        <input name="_method" type="hidden" value="DELETE">
                                        <button class="btn btn-danger btn-xs" type="submit"><i class="fas fa-eraser"></i></button>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="12" class="text-center">No hay Fechas Registrados</td>
                        </tr>
                    @endif
                    </tbody>
                </table>
            </div>
            {{ $fechas->links() }}
        </div>
    </div>
@endsection