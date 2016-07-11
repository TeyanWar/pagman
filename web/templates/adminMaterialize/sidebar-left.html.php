<!-- //////////////////////////////////////////////////////////////////////////// -->
<!-- START MAIN -->
<div id="main">
    <!-- START WRAPPER -->
    <div class="wrapper">

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
                <!-- Modulo de equipos -->
                <li class="no-padding">
                    <ul class="collapsible collapsible-accordion">
                        <li class="bold"><a class="collapsible-header waves-effect waves-cyan">
                                <i class="mdi-hardware-desktop-windows"></i> Equipos</a>
                            <div class="collapsible-body">
                                <ul>
                                    <li><a href="<?php echo crearUrl("Equipos", "equipos", "crear") ?>">Crear equipos</a>
                                    </li>
                                    <li><a href="<?php echo crearUrl("Equipos", "equipos", "listar") ?>">Listar equipos</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </li>
                <?php ?>
                <!-- Modulo de inventarios -->
                <li class="no-padding">
                    <ul class="collapsible collapsible-accordion">
                        <li class="bold"><a class="collapsible-header waves-effect waves-cyan">
                                <i class="mdi-image-exposure-plus-1"></i> Inventarios</a>
                            <div class="collapsible-body">
                                <ul>
                                    <li><a href="layout-fullscreen.html">Full Screen</a>
                                    </li>
                                    <li><a href="layout-horizontal-menu.html">Horizontal Menu</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </li>

                <!-- Modulo de mediciones -->
                <li class="no-padding">
                    <ul class="collapsible collapsible-accordion">
                        <li class="bold"><a class="collapsible-header waves-effect waves-cyan">
                                <i class="mdi-action-view-carousel"></i> Mediciones</a>
                            <div class="collapsible-body">
                                <ul>
                                    <li>
                                        <a class="submenu">Mediciones</a>
                                        <div class="submenu-lista">
                                            <ul>
                                                <li><a class="left-align" href="layout-fullscreen.html">
                                                        <i class="mdi-content-add-circle-outline"></i>Crear medici&oacute;n</a>
                                                </li>
                                                <li><a href="layout-horizontal-menu.html">
                                                        <i class="mdi-action-list"></i>Listar medici&oacute;n</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>

                                    <li><a class="submenu">Medidores</a>
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

                <!-- Modulo de OT -->
                <li class="no-padding">
                    <ul class="collapsible collapsible-accordion">
                        <li class="bold"><a class="collapsible-header waves-effect waves-cyan">
                                <i class="mdi-content-content-paste"></i> Ordenes</a>
                            <div class="collapsible-body">
                                <ul>
                                    <li><a href="layout-fullscreen.html">Full Screen</a>
                                    </li>
                                    <li><a href="layout-horizontal-menu.html">Horizontal Menu</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </li>

                <!-- Modulo de costos -->
                <li class="no-padding">
                    <ul class="collapsible collapsible-accordion">
                        <li class="bold"><a class="collapsible-header waves-effect waves-cyan">
                                <i class="mdi-editor-attach-money"></i> Costos</a>
                            <div class="collapsible-body">
                                <ul>
                                    <li><a href="layout-fullscreen.html">Full Screen</a>
                                    </li>
                                    <li><a href="layout-horizontal-menu.html">Horizontal Menu</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </li>

                <li class="li-hover"><div class="divider"></div></li>

                <li class="li-hover"><p class="ultra-small margin more-text">CONFIGURACI&Oacute;N</p></li>

                <!-- Modulo de Usuarios -->
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

                <li><a href="css-color.html"><i class="mdi-editor-format-color-fill"></i> Permisos</a>
                </li>

                <li class="li-hover"><div class="divider"></div></li>
                <li class="li-hover"><p class="ultra-small margin more-text">Daily Sales</p></li>

            </ul>
            <a href="#" data-activates="slide-out" class="sidebar-collapse btn-floating btn-medium waves-effect waves-light hide-on-large-only cyan"><i class="mdi-navigation-menu"></i></a>
        </aside>
        <!-- END LEFT SIDEBAR NAV-->