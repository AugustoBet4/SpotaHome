@extends('layout')

@section('content')
    <div class="col-sm-8">
        <h2>
            
            Listado Duenos
            <a href="{{ route('duenos.create') }}" class="btn btn-primary pull-right">Nuevo</a>
        
        </h2>
        @include('duenos.fragmento.info')
        <table class="table table-hover table-striped">
            <thead>
            <tr>
                <th width="20px">ID</th>
                <th width="5000px">Nombre</th>
                <th width="5px">Genero</th>

            </tr>
            </thead>
            <tbody>
            @foreach($duenos as $dueno)
            <tr>
                <td>{{$dueno->id_duenos}}</td>
                <td>
                    <strong>
                        {{$dueno->nombre}}
                    </strong>

                </td>

                <td>{{$dueno->genero}}</td>

                <td>
                    <a href="{{ route('duenos.show', $dueno->id_duenos) }}" class="btn btn-link">Ver</a>
                </td>
                <td>
                    <a href="{{ route('duenos.edit', $dueno->id_duenos) }}" class="btn btn-link">Editar</a>
                </td>
                <td>
                    <form action="{{route ('duenos.destroy', $dueno->id_duenos)}}" method="post">
                        {{csrf_field() }}
                        <input type="hidden" name="_method" value="DELETE">
                        <button class="btn btn-link">Borrar</button>
                    </form>
                </td>

            </tr>
            @endforeach
            </tbody>
        </table>
        {!! $duenos->render() !!}
    </div>

    <div class="col-sm-4">
        @include('duenos.fragmento.aside')
    </div>

@endsection