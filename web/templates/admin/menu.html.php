<nav role="navigation" class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button data-target="#bs-example-navbar-collapse-1" data-toggle="collapse" class="navbar-toggle" type="button">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="index.php" class="navbar-brand"><?php echo NOMBRE_APLICATIVO ?></a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div id="bs-example-navbar-collapse-1" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                
                <!-- Enlaces para ordenes de trabajo-->
                <li class="dropdown">
                    <a title="" data-toggle="dropdown" class="dropdown-toggle" href="#" aria-expanded="false">
                        Ordenes / Solicitudes <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="#"><i class="fa fa-globe fa-fw"></i>Ordenes de trabajo</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-globe fa-fw"></i>Solicitudes</a>
                        </li>
                    </ul>
                </li>
                
                <!-- Enlaces para equipos -->
                <li class="dropdown">
                    <a title="" data-toggle="dropdown" class="dropdown-toggle" href="#">Equipos <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="<?php echo crearUrl('equipos', 'equipos', 'crear') ?>"><i class="fa fa-list fa-fw"></i> Crear nuevo equipo</a>
                        </li>
                        <li>
                            <a href="<?php echo crearUrl('equipos', 'equipos', 'listar') ?>"><i class="fa fa-desktop fa-fw"></i> Consultar equipos</a>
                        </li>
                    </ul>
                </li>
                
                <!-- Enlaces para usuarios-->
                <li class="dropdown">
                    <a title="" data-toggle="dropdown" class="dropdown-toggle" href="#"> Usuarios <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="<?php echo crearUrl('usuarios', 'usuarios', 'crear') ?>"><i class="fa fa-list fa-fw"></i> Crear nuevo usuario</a>
                        </li>
                        <li>
                            <a href="<?php echo crearUrl('usuarios', 'usuarios', 'listar') ?>"><i class="fa fa-desktop fa-fw"></i> Consultar usuarios</a>
                        </li>
                    </ul>
                </li>
                
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a title="" data-toggle="dropdown" class="dropdown-toggle" href="#"><i class="fa fa-star text-yellow"></i> David Barona <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="#"><i class="fa fa-fw fa-paint-brush"></i>Perfil de usuario</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-shopping-cart"></i>Cerrar sesi&oacute;n</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>