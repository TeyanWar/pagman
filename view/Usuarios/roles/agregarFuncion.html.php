<div class="col s12 m12 l6">
    <div class="card-panel">

        <?php
        
            echo $modulo;
        ?>
        <form class="col s12" id="formFuncion" action="<?php echo crearUrl("Permisos", "permisos", "postCrearFuncion"); ?>" method="POST">
            <!--Datos del rol-->
            <!--<h4 class="header2">Datos del rol</h4>-->            
            <h5> AGREGAR PERMISOS Y/0 FUNCIONES AL ROL</h5><br><br>
            <select multiple="">
                <option value="1">Crear</option>
                <option value="2">Editar</option>
                <option value="3">Consultar</option>
                <option value="4">Eliminar</option>
            </select>
        </form>
        <div class="row">
            <div class="input-field col s12" id="<?php echo $modulo; ?>">
                <button name="action" type="submit" class="btn cyan waves-effect waves-light right">Registrar
                    <i class="mdi-content-add right"></i>
                </button> 
            </div>
        </div> 
    </div>
</div><br>
<?php include_once('templates/adminMaterialize/footer.html.php'); ?>
    