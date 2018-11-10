<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <span class="clear">
                                <strong class="font-bold">{{$user->nombre}}</strong>
                        </span>
                    </a>
                </div>
                <div class="logo-element">
                    Logo :v
                </div>
            </li>
            <li >
                <a href="{{ url('/inquilino') }}"><i class="fa fa-home"></i> <span class="nav-label">Inicio</span></a>
            </li>
            <li >
                <a href="{{ url('/inquilino/busqueda') }}"><i class="fa fa-search"></i> <span class="nav-label">Busqueda</span></a>
            </li>
            <li >
                <a href="#"><i class="fa fa-calendar"></i><span class="nav-label">Reservas</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    <li><a href="{{ url('/inquilino/reservas') }}">Reservas Actuales</a></li>
                    <li><a href="{{ url('/inquilino/historial') }}">Reservas Historicas</a></li>
                </ul>
            </li>
        </ul>

    </div>
</nav>
