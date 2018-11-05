@extends('layouts.app')
@section('content')
    <div class="card">

        <div class="card-header">
          SpotaHome
        </div>
        <div class="card-body">
          <h5 class="card-title">CRUD</h5>
          <p class="card-text">Gestion de Empleados</p>
          <a href="{{ route('empleado.create') }}"  class="btn btn-info" >Añadir Empleado</a>
        </div>

        <div class="card-body">
            <div class="table-container">
                <table id="mytable" class="table">
                    <thead class="thead-black">
                      <th>Nombre</th>
                     <th>Email</th>
                     <th>Telefono</th>
                     <th>Usuario</th>
                     <th>Contraseña</th>
                     <th>Editar</th>
                    <th>Eliminar</th>
                    </thead>

                    <tbody>
                    @if($empleado->count())
                        @foreach($empleado as $emp)
                            <tr>
                                <td>{{$emp->nombre}}</td>
                                <td>{{$emp->email}}</td>
                                <td>{{$emp->telefono}}</td>
                                <td>{{$emp->usuario}}</td>
                                <td>{{$emp->contrasena}}</td>

                                <td><a class="btn btn-warning" href="{{action('EmpleadoController@edit', $emp->id_empleado)}}" ><i class="far fa-edit"></i></a></td>
                                <td>
                                    <form action="{{action('EmpleadoController@destroy', $emp->id_empleado)}}" method="post">
                                        {{csrf_field()}}
                                        <input name="_method" type="hidden" value="DELETE">
                                        <button class="btn btn-danger btn-xs" type="submit"><i class="fas fa-eraser"></i></button>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="12" class="text-center">No hay Empleados Registrados</td>
                        </tr>
                    @endif
                    </tbody>
                </table>
            </div>
            {{ $empleado->links() }}
        </div>
    </div>
@endsection
