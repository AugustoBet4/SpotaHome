@foreach($infos as $info)
        Estimado <strong>{{ $info->nombre .' '. $info->apellidos }}</strong>,

        SpotaHome
        Le informamos que su propiedad fue reservada.

        


        <p>Direccion: {{ $info->direccion }}</p>
        <p>Fecha Inicio: {{ $info->fecha_inicio }}</p>
        <p>Fecha Fin: {{ $info->fecha_fin }}</p>

@endforeach