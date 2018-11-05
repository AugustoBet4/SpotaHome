@extends('layouts.app')
@section('content')
    <div class="card">
        <h2 class="card-header">
            Editar Empleado
        </h2>
        <div class="card-body">
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

            <form method="POST" action="{{ route('empleado.update',$empleado->id_empleado) }}"  role="form">
                {{ csrf_field() }}
                <input name="_method" type="hidden" value="PATCH">


                  <div class="form-group col-md-6">
                      <label for="fecha_inicio">Nombre</label>
                      <input type="text" name="nombre" class="form-control input-sm" id="nombre">
                  </div>

                  <div class="form-group col-md-6">
                      <label for="fecha_fin">Email</label>
                      <input type="text" name="email" class="form-control input-sm" id="email">
                  </div>

                  <div class="form-group col-md-6">
                      <label for="fecha_fin">Telefono</label>
                      <input type="number" name="telefono" class="form-control input-sm" id="telefono">
                  </div>

                  <div class="form-group col-md-6">
                      <label for="fecha_fin">Usuario</label>
                      <input type="text" name="usuario" class="form-control input-sm" id="usuario">
                  </div>

                  <div class="form-group col-md-6">
                      <label for="fecha_fin">Contraseña</label>
                      <input type="text" name="contraseña" class="form-control input-sm" id="contraseña">
                  </div>
                

                <div class="form-group">
                    <input type="submit" value="Actualizar" class="btn btn-success">
                    <a href="{{ route('empleado.index') }}" class="btn btn-link" >Volver al listado</a>
                </div>
            </form>
        </div>
    </div>

@endsection
