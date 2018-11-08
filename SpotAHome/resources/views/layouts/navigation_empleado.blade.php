<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <span class="clear">
                            <span class="block m-t-xs">
                                <strong class="font-bold">Example user</strong>
                            </span> <span class="text-muted text-xs block">Example menu <b class="caret"></b></span>
                        </span>
                    </a>
                    <ul class="dropdown-menu animated fadeInRight m-t-xs">
                        <li><a href="#">Logout</a></li>
                    </ul>
                </div>
                <div class="logo-element">
                    <img src="landing/img/logospotahome.png"/>
                </div>
            </li>
            <li >
                <a href="{{ url('/empleados/dashboard') }}"><i class="fa fa-home"></i> <span class="nav-label">Inicio</span></a>
            </li>
            <li >
                <a href="{{ url('/empleados/propiedad') }}"><i class="fa fa-search"></i> <span class="nav-label">Propiedades</span></a>
            </li>
            <li >
                <a href="{{ url('/empleados/historial') }}"><i class="fa fa-history"></i> <span class="nav-label">Estadisticas</span> </a>
            </li>
            <li >
                <a href="{{ url('/empleados/anular') }}"><i class="fa fa-ban"></i> <span class="nav-label">Homecheckers</span> </a>
            </li>
        </ul>

    </div>
</nav>