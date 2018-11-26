    @foreach($infos as $info)
        Estimado <strong>{{ $info->nombre .' '. $info->apellidos }}</strong>,

        Lamentamos informar que se anulo una reserva de una de sus propiedades.
        A continuacion informacion sobre la reserva Anulada:


        <p>Direccion: {{ $info->direccion }}</p>
        <p>Fecha Inicio: {{ $info->fecha_inicio }}</p>
        <p>Fecha Fin: {{ $info->fecha_fin }}</p>

    @endforeach