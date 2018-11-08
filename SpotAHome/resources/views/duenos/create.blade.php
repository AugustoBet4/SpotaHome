@extends('layouts.app_duenos')

@section('title', 'Inicio de duenos')

@section('content')
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="text-center m-t-lg">
                    <h1>
                        Bienvenido a SpotaHome
                    </h1>
                  </div>
                <form action="/duenos" method="POST" role="form">
                    {{ csrf_field() }}
                    <legend>Registrate Como due&ntilde;o</legend>
                    
                    <div class="form-group">
                        <label for="">Nombre</label>
                        <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Escriba sus Nombres">
                    </div>
                    <div class="form-group">
                        <label for="">Apellidos</label>
                        <input type="text" class="form-control" name="apellidos" id="apellidos" placeholder="Escriba sus apellidos">
                    </div>
                    <div class="form-group">
                        <label for="">E-mail</label>
                        <input type="email" class="form-control" name="email" id="email" placeholder="Escriba su e-mail ej:juan@ejemplo.com">
                    </div>
                    <div class="form-group">
                        <label for="">Telefono</label>
                        <input type="text" class="form-control" name="telefono" id="telefono" placeholder="Escriba su Nro. telefonico">
                    </div>
                    <div class="form-group">
                        <label for="">Fecha de Nacimiento</label>
                        <input type="date" class="form-control" name="fecha_nacimiento" id="fecha_nacimiento" >
                    </div>
                    <div class="form-group">
                        <label for="">Genero</label>
                        <select>
                            <option value="1">Masculino</option>
                            <option value="2">Femenino</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Nacionalidad</label>
                        <input type="text" class="form-control" name="nacionalidad" id="nacionalidad" placeholder="Ej. Boliviano">
                    </div>
                    <div class="form-group">
                        <label for="">Nombre de Usuario</label>
                        <input type="text" class="form-control" name="usuario" id="usuario">
                    </div>
                    <div class="form-group">
                        <label for="">Contrase&ntilde;a</label>
                        <input type="password" class="form-control" name="contrasena" id="contrasena">
                    </div>

                    <button type="submit"  class="btn btn-primary">Enviar</button>
                </form>


            </div>
        </div>
    </div>
@endsection