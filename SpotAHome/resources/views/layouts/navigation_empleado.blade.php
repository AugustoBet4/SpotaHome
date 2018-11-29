<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <span class="clear">
                            <span class="block m-t-xs">
                                <strong class="font-bold">Bienvenido</strong>
                            </span> <span class="text-muted text-xs block">Empleado<b class="caret"></b></span>
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
            <li >
                <a href="{{ url('/empleados/duenos') }}"><i class="fa fa-book"></i> <span class="nav-label">Administrar Due&ntilde;os</span></a>
            </li>
            <li >
                <a href="{{ url('/empleados/estadisticas') }}"><i class="fa fa-history"></i> <span class="nav-label">Estadisticas</span> </a>
            </li>
            <li >
                <a href="{{ url('/empleados/empleados') }}"><i class="fa fa-pencil-square"></i> <span class="nav-label">Empleados</span> </a>
            </li>
        </ul>

    </div>
</nav>
