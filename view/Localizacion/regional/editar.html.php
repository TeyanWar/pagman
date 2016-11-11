<center>
    <?php include 'templates/adminMaterialize/estandarEditarSena.html.php'; ?>    
</center>
<br>
<div class="row">
    <form class="col s12"  action="<?php echo crearUrl("localizacion", "regional", "postEditar") ?>" method="post">
        <div class="input-field col s6">
            <input  readonly=""type="text" id="reg_id" class="validate" name="reg_id" value="<?php echo $regional['reg_id'] ?>">
            <label style="color:#448aff;" for="reg_id" class="active" >Codigo de la regional:</label>

        </div>

        <div class="input-field col s6">
            <input  type="text" id="reg_nombre" class="validate" name="reg_nombre" value="<?php echo $regional['reg_nombre'] ?>">
            <label style="color:#448aff;" for="reg_nombre" class="active" >Nombre de la regional:</label>

        </div>

        <div class="col s12 m4 l8">
            <br>
            <br>
            <button name="action" type="submit" class="btn cyan waves-effect waves-light right teal">Editar
                <i class="mdi-content-send right teal "></i>
            </button>
        </div>

    </form>
</div>






</div>
