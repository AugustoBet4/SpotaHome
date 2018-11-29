<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <span class="clear">
                            <span class="block m-t-xs">
                                <strong class="font-bold">Bienvenido</strong>
                            </span> <span class="text-muted text-xs block">Dueño<b class="caret"></b></span>
                        </span>
                    </a>
                    <ul class="dropdown-menu animated fadeInRight m-t-xs">
                        <li><a href="#">Logout</a></li>
                    </ul>
                </div>
                <div class="logo-element">
                    Logo :v
                </div>
            </li>

            <li>
                <a href="{{ url('/duenos') }}"><i class="fa fa-home"></i> <span class="nav-label">Inicio</span></a>
            </li>

            <!--li>
                <a href="{{ url('/duenos') }}"><i class="fa fa-history"></i> <span class="nav-label">Actualiza tus datos</span> </a>
            </li-->

            <li>
                <a href="{{ url('/duenos/propiedad') }}"><i class="fa fa-pencil-square-o"></i> <span class="nav-label">Administra Viviendas</span> </a>
            </li>

            <li>
                <a href="{{ url('/duenos/reservas') }}"><i class="fa fa-calendar-check-o"></i> <span class="nav-label">Reservas</span></a>
            </li>

            <li>
                <a href="{{ url('/duenos/consultas') }}"><i class="fa fa-sticky-note"></i> <span class="nav-label">Consultas</span></a>
            </li>
        </ul>

    </div>
</nav>
