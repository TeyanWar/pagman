<div class="title center"><h5>EDITAR ORDEN DE TRABAJO # <?php echo $editarOt ['ot_id']; ?></h5></div>
<br>
<form class="col s12" data-url="
      <?php echo crearUrl("Ot", "ot", "postEditar", array('noVista' => 'noVista')) ?>" 
      data-redirect="<?php echo crearUrl("Ot", "ot", "listar") ?>" 
      method="POST" id="editarOt">

    <div class=" row">
        <div class="col s12 m8 l4">
            <label style="color: #448aff;"><h6>No. OT</h6></label>  
            <?php echo $editarOt['ot_id']; ?>
            <input type="hidden" value="<?php echo $editarOt['ot_id']; ?>" name="ot_id">
        </div>
        <div class="col s12 m8 l4">
            <label style="color: #448aff;"><h6>Fecha y hora de creaci&oacute;n</h6></label> 
            <?php echo $editarOt['ot_fecha_creacion']; ?>
        </div>
        <div class="col s12 m8 l4">
            <label style="color: #448aff;"><h6>Regional</h6></label> 
            <?php echo $editarOt['reg_nombre']; ?>
        </div>
    </div>

    <div class=" row">
        <div class="col s12 m8 l4">
            <label style="color: #448aff;"><h6>Centro de formaci&oacute;n</h6></label> 
            <?php echo $editarOt['cen_nombre'] ?>
        </div>
        <div class="col s12 m8 l4">
            <label style="color: #448aff;"><h6>Equipo</h6></label> 
            <?php echo $editarOt['equi_nombre'] ?>
        </div>

        <div class="col s12 m8 l4">
            <label style="color: #448aff;"><h6>Tipo de falla</h6></label> 
            <?php echo $editarOt['tfa_descripcion'] ?>
        </div>
    </div>
    <div class="row">
        <div class="col s12 m8 l4">
            <label style="color: #448aff;"><h6>Prioridad</h6></label> 
            <?php echo $editarOt['priotra_descripcion'] ?>
        </div>
        <div class="col s12 m8 l4">
            <label style="color: #448aff;"><h6>Encargado</h6></label> 
            <?php echo $editarOt['per_nombre'] ?>
        </div>
        <div class="input-field col s12 m4 l4">
            <label class="active">Estado</label>
            <select name="est_id" class="browser-default">
                <option value="" disabled selected>Seleccione</option>
                <?php foreach ($estados as $estado) { ?>
                    <?php if ($editarOt['est_id'] == $estado['est_id']) { ?>
                        <option value="<?php echo $estado['est_id'] ?>" selected><?php echo $estado['est_descripcion'] ?></option>
                    <?php } else { ?>
                        <option value="<?php echo $estado['est_id'] ?>"><?php echo $estado['est_descripcion'] ?></option>
                        <?php
                    }
                }
                ?>
            </select>
        </div>
    </div>
    <div class="row">

        <div class="col s12 m8 l4">
            <label style="color: #448aff;"><h6>Fecha de inicio</h6></label> 
            <?php echo $editarOt['ot_fecha_inicio'] ?>
        </div>
        <div class="col s12 m8 l4">
            <label style="color: #448aff;"><h6>Fecha fin</h6></label> 
            <?php echo $editarOt['ot_fecha_fin'] ?>
        </div>
    </div>
    <div class="divider"></div>
    <div class="row">
        <div class="col s12 m8 l12">
            <label style="color: #448aff;"><h6>Descripci&oacute;n falla</h6></label> 
            <textarea id="textarea2" name="ot_desc_falla" class="materialize-textarea validate" style="height: 22px;"> <?php echo $editarOt['ot_desc_falla'] ?></textarea>
        </div>
    </div>
    <div class="row">
        <div class="col s12 m8 l12">
            <label style="color: #448aff;"><h6>Descripci&oacute;n trabajo</h6></label> 
            <textarea id="textarea2" name="ot_desc_trabajo" class="materialize-textarea validate" style="height: 22px;"> <?php echo $editarOt['ot_desc_trabajo'] ?></textarea>
        </div>
    </div>
    <div class="row">
        <div class="col s12 m8 l8">
            <label style="color: #448aff;"><h6>Ayudantes</h6></label> 
            <input id="input_text" name="ayudantes" type="text" length="10" value="<?php echo $editarOt['ot_ayudantes'] ?>"> 
        </div>
    </div>
    <div class="row">
        <div class="col s12 m8 l8">
            <label style="color: #448aff;"><h6>Insumo</h6></label> 
            <input id="input_text" name="ins_id" type="text" length="10" value="<?php echo $editarOt['ins_nombre'] ?>"> 
        </div>
    </div>
    <div class="row">
        <button name="action" type="submit" class="btn teal waves-effect waves-light submit_editarOt" style="margin-left: 40%;">Guardar
            <i class="mdi-editor-border-color small left"> </i>
        </button>
    </div>
</form>