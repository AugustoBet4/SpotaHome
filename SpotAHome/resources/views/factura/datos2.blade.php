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

                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Nombre del Empleado:</label>

                                <div class="col-md-6">

                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('section') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Seccion:</label>

                                <div class="col-md-6">

                                    @if ($errors->has('section'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('section') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('reason') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Tipo de Solicitud:</label>

                                <div class="col-md-6">
                                    <select name="reason" id="reason" onclick="da()">
                                        <option selected disabled>Elija:</option>
                                                <option value="{{ $datas['id'] }}">{{ $datas['name'] }}</option>
                                                <option value="{{ $datas['id'] }}">{{ $datas['name'] }}</option>
                                        @endif
                                    </select>

                                    @if ($errors->has('reason'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('reason') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('days') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Número de Dias:</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="days" id="days" value="{{ old('days') }}">

                                    @if ($errors->has('days'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('days') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('start_date') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Fecha de Inicio:</label>

                                <div class="col-md-6">
                                    <input type="datetime-local" name="stdt" id="stdt">

                                    @if ($errors->has('manager'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('start_date') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('note') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Razon:</label>

                                <div class="col-md-6">
                                    <textarea class="form-control" name="note" rows="5" id="note" value="{{ old('note') }}"></textarea>
                                    @if ($errors->has('note'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('note') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary" onclick="enable()">
                                        Registrar Solicitud
                                    </button>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection