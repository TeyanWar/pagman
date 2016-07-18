<!-- //////////////////////////////////////////////////////////////////////////// -->
<!-- START MAIN -->
<div id="main">
    <!-- START WRAPPER -->
    <div class="wrapper">
        <?php 
        $objMenu=new MenuClass(); 
        $modulosRol=$objMenu->getModulos();
        ?>
        <!-- START LEFT SIDEBAR NAV-->
        <aside id="left-sidebar-nav">
            <ul id="slide-out" class="side-nav leftside-navigation">
                <li class="user-details cyan darken-2">
                    <div class="row">
                        <div class="col col s4 m4 l4">
                            <img src="<?php echo addLib('templates/adminMaterialize/images/avatar.jpg') ?>" alt="" class="circle responsive-img valign profile-image">
                        </div>
                        <div class="col col s8 m8 l8">
                            <ul id="profile-dropdown" class="dropdown-content">
                                <li><a href="#"><i class="mdi-action-face-unlock"></i> Profile</a>
                                </li>
                                <li><a href="#"><i class="mdi-action-settings"></i> Settings</a>
                                </li>
                                <li><a href="#"><i class="mdi-communication-live-help"></i> Help</a>
                                </li>
                                <li class="divider"></li>
                                <li><a href="#"><i class="mdi-action-lock-outline"></i> Lock</a>
                                </li>
                                <li><a href="<?php echo crearUrl('Sesion', 'sesion', 'cerrarSesion') ?>"><i class="mdi-hardware-keyboard-tab"></i> Logout</a>
                                </li>
                            </ul>
                            <a class="btn-flat dropdown-button waves-effect waves-light white-text profile-btn" href="#" data-activates="profile-dropdown"><?php echo $_SESSION['login']['per_nombre'] . " " . $_SESSION['login']['per_apellido']; ?><i class="mdi-navigation-arrow-drop-down right"></i></a>
                            <p class="user-roal"><?php echo $_SESSION['login']['rol_nombre'] ?></p>
                        </div>
                    </div>
                </li>

                <li class="bold"><a href="<?php echo addLib('') ?>" class="waves-effect waves-cyan">
                        <i class="mdi-action-dashboard"></i> Panel de control</a>
                </li>

                <!-- Modulos -->
                <?php foreach($modulosRol as $moduloRol){ ?>
                        <li class="no-padding">
                            <ul class="collapsible collapsible-accordion">
                                <li class="bold"><a class="collapsible-header waves-effect waves-cyan">
                                    <i class="<?php echo $moduloRol['mod_icono'];?>"></i> <?php echo $moduloRol['mod_nombre']; ?></a>
                                    <div class="collapsible-body">
                                        <ul>
                                            <?php foreach($moduloRol['controladores'] as $controlador){ ?>
                                                    <li>
                                                        <a class="submenu"><i class="<?php echo $controlador['cont_icono']; ?>"></i><?php echo $controlador['cont_display'];?></a>
                                                        <div class="submenu-lista">
                                                            <ul>
                                                                <?php foreach($controlador['funciones'] as $funcion){ ?>
                                                                        <li><a href="<?php echo crearUrl($moduloRol['mod_nombre'], $controlador['cont_nombre'], $funcion['func_nombre']) ?>">
                                                                            <i class="<?php echo $funcion['func_icono']; ?>"></i>
                                                                            <?php echo $funcion['func_display']; ?>
                                                                            </a>
                                                                        </li>
                                                                <?php } ?>
                                                            </ul>
                                                        </div>
                                                    </li>
                                            <?php } ?>
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                        </li>
                <?php } ?>

                <li class="li-hover"><div class="divider"></div></li>

                <li class="li-hover"><p class="ultra-small margin more-text">CONFIGURACI&Oacute;N</p></li>

                <!-- Modulos -->
                <li class="no-padding">
                    <ul class="collapsible collapsible-accordion">
                        <li class="bold"><a class="collapsible-header waves-effect waves-cyan">
                                <i class="mdi-social-person-outline"></i> Usuarios</a>
                            <div class="collapsible-body">
                                <ul>
                                    <!--Roles-->
                                    <li>
                                        <a class="submenu"><i class="mdi-social-group"></i>Roles</a>
                                        <div class="submenu-lista">
                                            <ul>
                                                <li><a href="<?php echo crearUrl('Roles', 'roles', 'crear') ?>">
                                                        <i class="mdi-content-add-circle-outline"></i>Crear rol</a>
                                                </li>
                                                <li><a href="<?php echo crearUrl('Roles', 'roles', 'listar') ?>">
                                                        <i class="mdi-action-list"></i>Listar roles</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                    <!--Permisos-->
                                    <li>
                                        <a class="submenu" href="<?php echo crearUrl('Permisos', 'permisos', 'crear') ?>">
                                            <i class="mdi-action-lock-open"></i>Permisos
                                        </a>
                                    </li>
                                    <!--Usuarios-->
                                    <li><a class="submenu">Usuarios</a>
                                        <div class="submenu-lista">
                                            <ul>
                                                <li><a href="layout-fullscreen.html">
                                                        <i class="mdi-content-add-circle-outline"></i>Crear medidor</a>
                                                </li>
                                                <li><a href="layout-horizontal-menu.html">
                                                        <i class="mdi-action-list"></i>Listar medidores</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </li>

                <li class="li-hover"><div class="divider"></div></li>                
            </ul>
        </aside>
        <!-- END LEFT SIDEBAR NAV-->