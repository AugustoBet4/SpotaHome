<div class="form-group">
    {!! Form::label('nombre', 'Nombre del dueno') !!}
    {!! Form::text('nombre',null,['class'=>'form-control']) !!}

</div>
<div class="form-group">
    {!! Form::label('genero', 'Genero') !!}
    {!! Form::text('genero',null,['class'=>'form-control']) !!}

</div>
<div class="form-group">
    {!! Form::label('nacionalidad', 'Nacionalidad') !!}
    {!! Form::text('nacionalidad',null,['class'=>'form-control']) !!}

</div>
<div class="form-group">
    {!! Form::label('fecha_nacimiento', 'Fecha de Nacimiento') !!}
    {!! Form::date('fecha_nacimiento',null,['class'=>'form-control']) !!}

</div>
<div class="form-group">
    {!! Form::label('email', 'E-mail') !!}
    {!! Form::email('email',null,['class'=>'form-control']) !!}

</div>
<div class="form-group">
    {!! Form::label('telefono', 'Telefono') !!}
    {!! Form::number('telefono',null,['class'=>'form-control']) !!}

</div>
<div class="form-group">

    {!! Form::submit('Enviar',['class'=>'btn btn-primary']) !!}

</div>