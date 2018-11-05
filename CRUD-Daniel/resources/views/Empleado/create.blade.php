@extends('layouts.app')
@section('content')

    <div class="card">
        <h2 class="card-header">
            Agregar Empleado
        </h2>
        <div class="card-body">
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if(Session::has('success'))
                <div class="alert alert-info">
                    {{ Session::get('success') }}
                </div>
            @endif

            <form method="POST" action="{{ route('empleado.store') }}"  role="form">
                {{ csrf_field() }}

                  <br><br>
                        <input type="text" name="id_propiedades" class="form-control input-sm" id="id_propiedades" value="1" hidden="true">
                    <div class="form-group col-md-6">
                        <label for="fecha_inicio"><h5>Nombre</h5></label>
                        <input type="text" name="nombre" class="form-control input-sm" id="nombre">
                    </div>

                    <div class="form-group col-md-6">
                        <label for="fecha_fin"><h5>Email</h5></label>
                        <input type="text" name="email" class="form-control input-sm" id="email">
                    </div>

                    <div class="form-group col-md-6">
                        <label for="fecha_fin"><h5>Telefono</h5></label>
                        <input type="number" name="telefono" class="form-control input-sm" id="telefono">
                    </div>

                    <div class="form-group col-md-6">
                        <label for="fecha_fin"><h5>Usuario</h5></label>
                        <input type="text" name="usuario" class="form-control input-sm" id="usuario">
                    </div>

                    <div class="form-group col-md-6">
                        <label for="fecha_fin"><h5>Contraseña</h5></label>
                        <input type="password" name="contraseña" class="form-control input-sm" id="contraseña">
                    </div>



                <div class="form-group">
                    <input type="submit" value="Guardar" class="btn btn-success">
                    <a href="{{ route('empleado.index') }}" class="btn btn-link" >Volver al listado</a>
                </div>
            </form>
          </div>
        </div>

@endsection
