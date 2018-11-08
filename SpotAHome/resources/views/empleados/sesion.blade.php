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
        <div class="form-group" >
            <input type="text" class="form-control" id="usuario" placeholder="Usuario" required>
            {!! $errors->first('usuario','<span id="span-error">:message</span>') !!}
        </div>
        <div class="form-group">
            <input type="password" class="form-control" id="contrasena" placeholder="Contraseña" required>
            {!! $errors->first('contrasena','<span id="span-error">:message</span>') !!}
        </div>
        <div class="form-group form-group-btn">
            <button type="submit" class="btn btn-success btn-lg">Ingresar</button>
        </div>
        <div class="clearfix"></div>
        <div class="checkbox">
            <label>
                <!--
                <input type="checkbox">Recuerdame?</label>
                -->
            </label>
        </div>
    </form>
</div>
</body>

</html>
