@extends('layouts.app_duenos')

@section('title', 'Inicio de Empleado')

@section('content')
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="text-center m-t-lg">
                    <h1>
                       SpotaHome Bolivia
                    </h1>
                </div>
                <form action="/propiedades" method="POST" role="form">
                    {{ csrf_field() }}
                    <legend>Registrate Tu Vivienda</legend>

                    <div class="form-group">
                        <label for="">Direccion</label>
                        <input type="text" class="form-control" name="direccion" id="direccion" placeholder="Dir. Vivienda / Av. Ejemplo Esq. Ejmplo">
                    </div>
                    <div class="form-group">
                        <label for="">Ciudad</label>
                        <input type="text" class="form-control" name="ciudad" id="ciudad" placeholder="Ciudad de la Vivienda">
                    </div>
                    <div class="form-group">
                        <label for="">Zona</label>
                        <input type="text" class="form-control" name="zona" id="zona" placeholder="Zona de la Vivienda">
                    </div>
                    <div class="form-group">
                        <label for="">Latitud</label>
                        <input type="number" class="form-control" name="latitud" id="latitud" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="">Longitud</label>
                        <input type="number" class="form-control" name="longitud" id="longitud" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="">Costo</label>
                        <input type="number" class="form-control" name="costo" id="costo" placeholder="Precio">
                    </div>
                    <div class="form-group">
                        <label for="">Fecha Inicio Disponible</label>
                        <input type="date" class="form-control" name="fecha_inicio" id="fecha_inicio">
                    </div>
                    <div class="form-group">
                        <label for="">Fecha Fin Disponible</label>
                        <input type="date" class="form-control" name="fecha_fin" id="fecha_fin">
                    </div>
                    <div class="form-group">
                        <label for="">Fecha de Nacimiento</label>
                        <textarea type="date" class="form-control" name="descripcion" id="descripcion" >Descripcion</textarea>
                        <input type="number" class="hidden" name="id_dueno" id="id_dueno" value="{{$user->id_dueno}}">
                    </div>
                    <button type="submit"  class="btn btn-primary">Crear</button>
                </form>


            </div>
        </div>
    </div>
@endsection
