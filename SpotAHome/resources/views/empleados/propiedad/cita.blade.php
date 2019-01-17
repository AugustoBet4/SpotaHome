@extends('layouts.app_empleado')

@section('title', 'Creacion de Cita Homechecker')

@section('content')
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <section class="content">
                <div class="col-md-12 col-md-offset-0">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div align="center">
                                <h1>Crear cita de homechecker</h1>
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
                            <form action="{{ url('/regcita') }}" method="POST" role="form">
                                {{ csrf_field() }}
                                <legend>Registra la cita</legend>

                                <div class="form-group">
                                    <label for="">Fecha de Revision</label>
                                    <input required value="{{old('fecha_nacimiento')}}" min="2019-01-01" type="date" class="form-control" name="fecha" id="fecha" >
                                </div>
                                <div class="form-group">
                                    <label for="">Hora de Revision</label>
                                    <input required value="{{old('hora')}}" type="time" class="form-control" name="hora" id="hora" >
                                </div>
                                <div class="form-group">
                                    <label for="">Observaciones</label>
                                    <input value="{{old('nacionalidad')}}" type="text" class="form-control" name="obs" id="obs" >
                                </div>

                                <input type="hidden" name="id" value={{ $id }}>

                                <button type="submit"  class="btn btn-primary">Confirmar</button>
                            </form>

                        </div>

                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection