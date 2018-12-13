@extends('layouts.app_inquilino')

@section('title', 'Compra de lugar')

@section('content')
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <section class="content">
                <div class="col-md-10 col-md-offset-2">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="pull-left"><h1>Datos Personales</h1></div>

                            <br><br><br><br><br>
                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Nombre y Apellido:</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="days" id="days" value="{{ old('days') }}">

                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <br>
                            <div class="form-group{{ $errors->has('section') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Email:</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="days" id="days" value="{{ old('days') }}">

                                    @if ($errors->has('section'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('section') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <br>
                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Telefono:</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="days" id="days" value="{{ old('days') }}">

                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <br>
                            <div class="form-group{{ $errors->has('start_date') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Fecha de Nacimiento:</label>

                                <div class="col-md-6">
                                    <input type="datetime-local" name="stdt" id="stdt">

                                    @if ($errors->has('manager'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('start_date') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <br>
                            <div class="form-group{{ $errors->has('reason') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Sexo:</label>

                                <div class="col-md-6">
                                    <select name="reason" id="reason" onclick="da()">
                                        <option selected disabled>Elija:</option>
                                                <option value="0">Maculino</option>
                                                <option value="1">Femenino</option>
                                    </select>

                                    @if ($errors->has('reason'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('reason') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <br>
                            <div class="form-group{{ $errors->has('reason') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Nacionalidad:</label>

                                <div class="col-md-6">
                                    <select name="reason" id="reason" onclick="da()">
                                        <option selected disabled>Elija:</option>
                                        <option value="0">Boliviana</option>
                                        <option value="1">Extranjera</option>
                                    </select>

                                    @if ($errors->has('reason'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('reason') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <br><br>
                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Acepto los servicios y condiciones</label>

                                <div class="col-md-6">
                                    <input type="checkbox" name="terminos" value="1">Si acepto<br>
                                </div>
                            </div>


                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <a href="{{action('FacturaController@fin', $id2)}}" class="btn btn-link">Reservar</a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection