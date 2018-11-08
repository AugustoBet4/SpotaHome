<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Inicio de Sesión</title>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="login-empleado/styles.css">
</head>
<body>
<div class="container" id="log-in-form">
    <div class="heading">
        <h1>Inicia Sesión</h1>
    </div>
    <form method="POST" action="{{route('sesion')}}">
        {{csrf_field()}}
        <div class="form-group" {{$errors-> has('user') ? 'has-error':''}} >
            <input type="text" class="form-control" id="user" placeholder="Usuario">
            {!! $errors->first('user','<span class="help-block">:message</span>') !!}
        </div>
        <div class="form-group" {{$errors-> has('pass') ? 'has-error':''}} >
            <input type="password" class="form-control" id="pass" placeholder="Contraseña">
            {!! $errors->first('pass','<span class="help-block">:message</span>') !!}
        </div>
        <div class="form-group form-group-btn">
            <button type="submit" class="btn btn-success btn-lg">Ingresar</button>
        </div>
        <div class="clearfix"></div>
        <div class="checkbox">
            <label>
                <input type="checkbox">Recuerdame?</label>
        </div>
    </form>
</div>
</body>

</html>
