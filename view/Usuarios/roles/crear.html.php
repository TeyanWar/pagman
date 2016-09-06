<div class="col s12 m12 l6">
    <div class="card-panel">
        <h5>CREACION DE ROL</h5>
        <ol class="breadcrumbs"> 
            <li><a href="<?php echo addLib('') ?>">Panel de control</a></li> 
            <li><a href="#">Usuarios</a></li> 
            <li><a href="#">Roles</a></li> 
            <li class="active">Crear rol</li> 
        </ol>
        <div id="card-alert" class="card teal"> 
            <div class="card-content white-text"> 
                <p><i class="mdi-action-info-outline"></i> 
                    IMPORTANTE : Los campos marcados con (*) son obligatorios.
                </p> 
            </div> 
            <button type="button" class="close white-text" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
        <!--Inicio contenedor mensajes de error-->
        <div class="card red">
            <div id="cont_errors_ajax" class="card-content white-text">
            </div>
        </div>
        <!--Fin contenedor mensajes de error-->
        
        <form class="formValidate" novalidate id="form_crear_rol" class="col s12" action="<?php echo crearUrl("roles", "roles", "postCrear",array('noVista')) ?>" method="POST">
            <!--Datos del rol-->
            <div class="row">
                <div class="input-field col s4">
                    <input type="text" id="rol_nombre" name="rol_nombre" length="20">
                    <label for="rol_nombre">(*) Nombre</label>
                </div>
                <div class="input-field col s8">
                    <input id="rol_descripcion" name="rol_descripcion" type="text" length="100">
                    <label for="rol_descripcion">(*) Descripci&oacute;n</label>
                </div>
            </div> 
            <!--fin datos rol-->

            <div class="row">
                <div class="input-field col s12">

                    <button name="action" type="submit" class="btn teal waves-effect waves-light right btn_submit_modal">Crear
                        <i class="mdi-content-send right"></i>
                    </button>
                </div>
            </div>
        </form>

    </div>
</div>
