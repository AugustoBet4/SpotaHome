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
                                    <input type="text" class="form-control" name="days" id="nombre" value="{{ old('days') }}">

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
                                    <input type="text" class="form-control" name="days" id="email" value="{{ old('days') }}">

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
                                    <input type="text" class="form-control" name="days" id="telefono" value="{{ old('days') }}" onkeypress="javascript:return isNumber(event)">

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
                                    <input type="date" name="stdt" id="fecha">

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
                                    <select name="reason" id="sexo" onclick="da()">
                                        <option selected disabled value="">Elija:</option>
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
                                    <select name="reason" id="nacionalidad" onclick="da()">
                                        <option selected disabled value="">Elija:</option>
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
                                    <input type="checkbox" name="terminos" id="terminos" value="1">Si acepto<br>
                                </div>
                            </div>


                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <a href="{{action('FacturaController@fin', $id2)}}" class="btn btn-link" onclick="checkEmail(); return validation();">Reservar</a>
                                </div>
                            </div>

                            <script>
                                function validation() {
                                    if (document.getElementById("nombre").value == ""){
                                        alert("Se debe llenar el campo Nombre");
                                        return false;
                                    }
                                    if (document.getElementById("email").value == ""){
                                        alert("Se debe llenar el campo Email");
                                        return false;
                                    }
                                    if (document.getElementById("telefono").value == ""){
                                        alert("Se debe llenar el campo Telefono");
                                        return false;
                                    }

                                    if (document.getElementById("fecha").value == ""){
                                        alert("Se debe llenar el campo Fecha");
                                        return false;
                                    }
                                    if (document.getElementById("sexo").value == ""){
                                        alert("Se debe llenar el campo Sexo");
                                        return false;
                                    }
                                    if (document.getElementById("nacionalidad").value == ""){
                                        alert("Se debe llenar el campo Nacionalidad");
                                        return false;
                                    }
                                    if (document.getElementById("terminos").checked == false){
                                        alert("Se debe aceptar los Terminos");
                                        return false;
                                    }
                                }

                                function isNumber(evt) {
                                    var iKeyCode = (evt.which) ? evt.which : evt.keyCode
                                    if (iKeyCode != 46 && iKeyCode > 31 && (iKeyCode < 48 || iKeyCode > 57))
                                        return false;

                                    return true;
                                }

                                function checkEmail() {

                                    var email = document.getElementById('email');
                                    var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

                                    if (!filter.test(email.value)) {
                                        alert('Please provide a valid email address');
                                        email.focus;
                                        return false;
                                    }
                                }
                            </script>

                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection