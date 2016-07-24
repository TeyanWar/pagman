<div class="col s12 m12 l6">
    <div class="card-panel">
        <h5>CREAR ROL</h5>
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

        </div>
        <?php if(isset($_SESSION['mensajeError'])){ ?>
        <div id="card-alert" class="card red">
            <div class="card-content white-text">
                <?php echo getErrores(); ?>
            </div>
        </div>
        <?php } ?>
        <form class="col s12" action="<?php echo crearUrl("roles", "roles", "postCrear") ?>" method="POST">
            <!--Datos del rol-->
            <!--<h4 class="header2">Datos del rol</h4>-->            
            <div class="row">
                <div class="input-field col s4">
                    <input id="rol_nombre" name="rol_nombre" class="validate" type="text">
                    <label class="" for="rol_nombre">(*) Nombre</label>
                </div>
                <div class="input-field col s8">
                    <input id="rol_descripcion" name="rol_descripcion" class="validate" type="text">
                    <label class="" for="rol_descripcion">(*) Descripción</label>
                </div>
            </div> <!--fin datos rol-->

            <div class="row">
                <div class="input-field col s12">
                    <button name="action" type="submit" class="btn cyan waves-effect waves-light right">Crear
                        <i class="mdi-content-send right"></i>
                    </button>
                </div>
            </div>
        </form>

    </div>
</div>
