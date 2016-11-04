<div class="title center"><h5>Editar orden de trabajo No. <?php echo $editarOt ['ot_id']; ?></h5></div>
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
            <label style="color: #448aff;"><h6>Centro de formaci&oacute;n</h6></label> 
            <?php echo $editarOt['cen_nombre'] ?>
        </div>
    </div>

    <div class=" row">
        <div class="col s4 m4 l4">
            <label style="color: #448aff;"><h6>Equipo</h6></label> 
            <?php echo $editarOt['equi_nombre'] ?>
        </div>
        <div class="col s4 m4 l4">
            <label style="color: #448aff;"><h6>Tipo de falla</h6></label> 
            <?php echo $editarOt['tfa_descripcion'] ?>
        </div>
        <div class="col s4 m4 l4">
        <?php if(!empty($detcomponentes) && $detcomponentes[0][0]!='INDEFINIDO'){ ?>
                  <label style="color: #448aff;"><h6>Componentes</h6></label>
                  <?php foreach ($detcomponentes as $detcomp) {
                           echo $detcomp['comp_descripcion']." "."";
                        }
                  ?>
        <?php } ?>
        </div>
    </div>
    <div class="row">
        <div class="col s12 m8 l4">
            <label style="color: #448aff;"><h6>Prioridad</h6></label> 
            <?php echo $editarOt['ot_prioridad'] ?>
        </div>
        <div class="col s12 m8 l4">
            <label style="color: #448aff;"><h6>Encargado</h6></label> 
            <?php echo $editarOt['per_nombre'] ?>
        </div>
        <div class="input-field col s12 m4 l4">
            <small class="active" style="color: #448aff;"><h6>Estado</h6></small>
            <select name="est_id" id="est_id" class="error browser-default select2" data-error=".errorTxt12">
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
            <div class="errorTxt12"></div>
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
        <div class="input-field col s12 m12 l12">
            <input value="<?php echo $editarOt['ot_observacion'] ?>" id="ot_observacion" type="text" name="ot_observacion" class="validate">
            <label for="ot_observacion" class="active" style="color: #448aff;"><h6>Observaciones</h6></label>                    
        </div>
    </div>
    
    <br>
    <div class="divider"></div>
    <div class="row">
        <?php if(!empty($guia['texto_guia'])){ ?>
            <div class="col s12 m8 l12">
                <label style="color: #448aff;"><h6>Guia Mantenimiento</h6></label> 
                <?php echo $guia['texto_guia'] ?>
            </div>
        <?php } ?>
    </div>
    <br>
    <div class="row">
        <?php if($mant['id_mantenimiento']!=""){ ?>
            <div class="input-field col s5 m5 l5">
                <small style="color: #448aff;"><h6>¿Cumplio con los estandares de mantenimiento?</h6></small>
                <select id="estandar" name="estandar" class="error browser-default select2" data-error=".errorTxt14">
                    <option value="" disabled selected>Seleccione</option>
                    <?php 
                        if($m['estandar']!=""){
                            if($m['estandar']==='Si cumple'){
                                echo "<option value='".$m['estandar']."' selected>". $m['estandar'] . "</option>";
                            }  else {
                                echo "<option value='".$m['estandar']."' selected>". $m['estandar'] . "</option>";
                            }
                        }
                    ?>
                    <option value="Si cumple" >Si cumple</option>
                    <option value="No cumple" >No cumple</option>
                </select>
                <div class="errorTxt14"></div>
            </div>
        <?php } ?>
    </div>
    <br>
    <div class="row">
        
        <div class="col s6">
            <label style="color: #448aff;"><h6>INSUMOS</h6></label>
            <?php if(!empty($detalleinsumos)){ ?>
            <table class="striped">
                <thead>
                    <tr>
                        <th data-field="registro">Nombre</th>
                        <th data-field="name">Unidad Medida</th>
                        <th data-field="id">Valor</th>
                        <th data-field="name">Cantidad</th>
                    </tr>
                </thead>
                <tbody>
                    <?php					
                    foreach ($detalleinsumos as $detins) {
                        ?>
                        <tr>
                            <td><?php echo $detins['ins_nombre'] ?></td>
                            <td><?php echo $detins['umed_descripcion'] ?></td>
                            <td><?php echo $detins['ins_valor'] ?></td>
                            <td><?php echo $detins['ins_cantidad'] ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <?php }else{ ?>
            <h6 style="color: #FF0000;">Esta ot no cuenta con insumos</h6>
            <?php } ?>
        </div>

        <div class="col s6">
            <label style="color: #448aff;"><h6>HERRAMIENTAS</h6></label>
            <?php if(!empty($detalleherramientas)){ ?>
            <table class="striped">
                <thead>
                    <tr>
                        <th data-field="registro">Nombre</th>
                        <th data-field="name">Descripcion</th>
                        <th data-field="name">Cantidad</th>
                    </tr>
                </thead>
                <tbody>
                    <?php					
                    foreach ($detalleherramientas as $dether) {
                        ?>
                        <tr>
                            <td><?php echo $dether['her_nombre'] ?></td>
                            <td><?php echo $dether['her_descripcion'] ?></td>
                            <td><?php echo $dether['cantidad'] ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <?php }else{ ?>
                <h6 style="color: #FF0000;">Esta ot no cuenta con herramientas</h6>
            <?php } ?>
        </div>
    </div>
    <br>
        <div class="row">
            <button name="action" type="submit" class="btn teal waves-effect waves-light submit_editarOt" style="margin-left: 40%;">Guardar
                <i class="mdi-editor-border-color small left"> </i>
            </button>
        </div>
</form>

<script>
    $(".select2").select2({});
    //----------------- validaciones ---------------
    $("#editarOt").validate({
        rules: {
            est_id: {
                required: true
            },
            estandar: {
                required: true
            },
            cgender:"required",
			cagree:"required",
        },
        //For custom messages
        messages: {
            est_id:{
                required: "El Estado es obligatorio."
            },
            estandar:{
                required: "Este campo es obligatorio."
            },
            curl: "Enter your website",
        },
        errorElement : 'div',
        errorPlacement: function(error, element) {
          var placement = $(element).data('error');
          if (placement) {
            $(placement).append(error)
          } else {
            error.insertAfter(element);
          }
        }
    });

</script>
