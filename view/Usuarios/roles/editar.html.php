<div class="col s12 m12 l6">
    <div class="card-panel">
        <h5>EDITAR ROL</h5>
        <ol class="breadcrumbs"> 
            <li><a href="<?php echo addLib('') ?>">Panel de control</a></li> 
            <li><a href="#">Usuarios</a></li> 
            <li><a href="#">Roles</a></li> 
            <li class="active">Editar rol</li> 
        </ol>
        <div id="card-alert" class="card teal"> 
            <div class="card-content white-text"> 
                <p><i class="mdi-action-info-outline"></i> 
                    IMPORTANTE : Los campos marcados con (*) son obligatorios.
                    Debe dejar asignado al menos UNA función al rol que está modificando. 
                </p> 
            </div> 
            <button type="button" class="close white-text" datadismiss="alert" aria-label="Close"> 
                <span aria-hidden="true">×</span> 
            </button> 
        </div>
        <form id="form_roles">
            <!--Datos del rol-->
            <h4 class="header2">Datos del rol</h4>            
            <div class="row">
                <div class="input-field col s4">
                    <input id="rol_nombre" name="rol_nombre" class="validate" type="text" value="<?php echo $rol['rol_nombre'] ?>">
                    <label class="active" for="rol_nombre">(*) Nombre</label>
                </div>
                
                <div class="input-field col s8">
                    <input id="rol_descripcion" name="rol_descripcion" class="validate" type="text" value="<?php echo $rol['rol_descripcion'] ?>">
                    <label class="active" for="rol_descripcion">(*) Descripción</label>
                </div>
            </div> <!--fin datos rol-->

            <!--Menu de módulos-->
            <h4 class="header2">Asignar funciones al rol</h4>
            <div class="row">
                <div id="contenedor_menu_modulos">
                    <ul id="menu_modulos" style="width: 100%;" class="tabs tab-demo z-depth-1">    
                        <?php foreach ($modulos as $modulo) { ?>
                            <li class="tab">
                                <a class="modulos" href="" data-url="<?php echo crearUrl('Roles', 'roles', 'mostrarControladores', array('noVista' => 'noVista', 'mod_id'=>$modulo['mod_id'],'accion'=>'modificar', 'rol_id'=>$rol_id)) ?>"><?php echo $modulo['mod_nombre']; ?></a>
                            </li>
                        <?php } ?>
                        <div style="right: 298px; left: 150px;" class="indicator"></div><div style="right: 298px; left: 150px;" class="indicator"></div>
                    </ul>
                </div>
            </div> <!--fin menu modulos-->

            <!--Controladores-->
            <div id="contenedor_controladores" class="row"><!--Aquí se cargan los controladores--></div>
            <br>    
            <button id="editar_rol" data-url="<?php echo crearUrl("Roles", "roles", "postEditar", array('noVista' => 'noVista',$rol_id)) ?>" class="btn waves-effect waves-light teal" type="button">
                Editar rol
            </button>   
        </form>
    </div>
</div>