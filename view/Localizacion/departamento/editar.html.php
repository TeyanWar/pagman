<center>
    <?php include 'templates/adminMaterialize/estandarEditarSena.html.php'; ?>    
</center>
<br>
<div class="row">
    <form class="col s12"  action="<?php echo crearUrl("localizacion", "departamento", "postEditar") ?>" method="post">
        <br><br>
        <div class="input-field col s6">
            <input  readonly=""type="text" id="dept_id" class="validate" name="dept_id" value="<?php echo $departamentos['dept_id']; ?>">
            <label style="color:#448aff;"  for="reg_id" class="active" >Codigo departamento:</label>

        </div>
        <div class="input-field col s6">
            <input  type="text" id="dept_nombre" class="validate" name="dept_nombre" value="<?php echo $departamentos['dept_nombre']; ?>">
            <label style="color:#448aff;"  for="dept_nombre" class="active" >Nombre departamento:</label>

        </div>

        <div class="input-field col s12">
            <select class="select2"  name="reg_id">
                <?php
                foreach ($regionales as $regional) {
                    if ($regional['reg_id'] == $departamentos['reg_id']) {
                        echo "<option value=" . $regional['reg_id'] . " selected >" . $regional['reg_nombre'] . "</option>";
                    } else {
                        echo "<option value=" . $regional['reg_id'] . " >" . $regional['reg_nombre'] . "</option>";
                    }
                }
                ?>
            </select>

        </div>



        <div class="col s12 m8 offset-m2 l6 offset-l3">
            <button name="action" type="submit" class="btn cyan waves-effect waves-light right  teal ">Editar
                <i class="mdi-content-send right  teal "></i>
            </button>
        </div>

    </form>
</div>
<script>
    $('select').material_select();

</script>





