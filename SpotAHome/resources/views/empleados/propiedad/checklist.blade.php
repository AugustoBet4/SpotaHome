@extends('layouts.app_empleado')

@section('title', 'Verificacion Homechecker')

@section('content')
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <section class="content">
                <div class="col-md-12 col-md-offset-0">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div align="center">
                                <h1>Verificacion de propiedad</h1>
                            </div>

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
                            <form action="{{ url('/regverif') }}" method="POST" role="form">
                                {{ csrf_field() }}
                                <legend>Formulario</legend>

                                <div class="form-group">
                                    <label for="">¿Tiene sala de estar?</label>
                                    <input type="hidden" class="form-control" name="sala" id="sala" value="0">
                                    <input type="checkbox" class="form-control" name="sala" id="sala" value="1">
                                </div>
                                <div class="form-group">
                                    <label for="">¿Tiene Cocina?</label>
                                    <input type="hidden" class="form-control" name="cocina" id="cocina" value="0">
                                    <input type="checkbox" class="form-control" name="cocina" id="cocina" value="1">
                                </div>
                                <div class="form-group">
                                    <label for="">¿Tiene Baño?</label>
                                    <input type="hidden" class="form-control" name="bano" id="bano" value="0">
                                    <input type="checkbox" class="form-control" name="bano" id="bano" value="1">
                                </div>
                                <div class="form-group">
                                    <label for="">¿Tiene mas de un solo baño?</label>
                                    <input type="hidden" class="form-control" name="masbano" id="masbano" value="0">
                                    <input type="checkbox" class="form-control" name="masbano" id="masbano" value="1">
                                </div>
                                <div class="form-group">
                                    <label for="">¿Tiene Luz?</label>
                                    <input type="hidden" class="form-control" name="luz" id="luz" value="0">
                                    <input type="checkbox" class="form-control" name="luz" id="luz" value="1">
                                </div>
                                <div class="form-group">
                                    <label for="">¿Tiene Agua?</label>
                                    <input type="hidden" class="form-control" name="agua" id="agua" value="0">
                                    <input type="checkbox" class="form-control" name="agua" id="agua" value="1">
                                </div>
                                <div class="form-group">
                                    <label for="">¿Tiene Patio?</label>
                                    <input type="hidden" class="form-control" name="patio" id="patio" value="0">
                                    <input type="checkbox" class="form-control" name="patio" id="patio" value="1">
                                </div>
                                <div class="form-group">
                                    <label for="">¿Se encuentra amoblado?</label>
                                    <input type="hidden" class="form-control" name="amoblado" id="amoblado" value="0">
                                    <input type="checkbox" class="form-control" name="amoblado" id="amoblado" value="1">
                                </div>

                                <input type="hidden" name="id" value={{ $id }}>

                                <button type="submit"  class="btn btn-primary">Aceptar</button>
                            </form>

                        </div>

                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection