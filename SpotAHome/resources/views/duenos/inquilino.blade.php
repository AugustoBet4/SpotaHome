@extends('layouts.app_duenos')

@section('title', 'Dueno')

@section('content')

    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <section class="content">
                <div class="col-md-12 col-md-offset-0">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="col-md-6">
                                <STRONG>Nombre:</STRONG> {{$inquilino->nombre}}<BR>
                                <STRONG> Apellido:</STRONG> {{$inquilino->apellidos}}<BR>
                            <STRONG> Correo Electronico:</STRONG> {{$inquilino->email}}<BR>
                            <STRONG> Telefono:</STRONG> {{$inquilino->telefono}}<BR>
                            <STRONG> Fecha de Nacimiento:</STRONG> {{$inquilino->fecha_nacimiento}}<BR>
                            <STRONG> Genero:</STRONG> {{$inquilino->genero}}<BR>
                            <STRONG> Nacionalidad:</STRONG> {{$inquilino->nacionalidad}}<BR>
                            </div>
                            <div class="col-md-6">
                                FOTO

                            </div>

                    </div>
                </div>
                </div>
            </section>
        </div>
    </div>


    <div id="disqus_thread"></div>
    <script>

        /**
         *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
         *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/

        var disqus_config = function () {
        this.page.url = '{{Request::url()}}';  // Replace PAGE_URL with your page's canonical URL variable
        this.page.identifier = {{$inquilino->id_inquilino}}; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
        };

        (function() { // DON'T EDIT BELOW THIS LINE
            var d = document, s = d.createElement('script');
            s.src = 'https://spotahomesis.disqus.com/embed.js';
            s.setAttribute('data-timestamp', +new Date());
            (d.head || d.body).appendChild(s);
        })();
    </script>
    <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>

@endsection