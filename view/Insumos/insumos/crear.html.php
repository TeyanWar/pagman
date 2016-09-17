<div class="col s12 m12">
    <form class="col s12 m12 l12 F_registrar_ins" action="<?php echo crearUrl("insumos", "insumos", "postCrear") ?>" method="POST">
        <div class="card-panel">
            <h4 class="header2">Registrar insumo</h4>
            <ol class="breadcrumbs">
                <li><a href="<?php echo addLib('') ?>">Panel de control</a></li>
                <li><a href="#">Insumos</a></li>
                <li class="active">Registrar insumo</li>
            </ol>
            <div id="card-alert" class="card teal">
                <div class="card-content white-text">
                    <p><i class="mdi-action-info-outline"></i>
                        <strong>INFORMACI&Oacute;N GENERAL :</strong><br />
                        aqui se lleva a cabo el registro de insumos con los siguientes datos :<br />
                        &#45; codigo insumo, nombre insumo, descripci&oacute;n, unidad de medida
                    </p>
                </div>
                <button type="button" class="close white-text" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <?php
            $miserrores = getErrores();
            if (!$miserrores == "") {
                ?>
                <div id="card-alert" class="card red">
                    <div class="card-content white-text">
                        <p><i class="mdi-action-info-outline"></i>
                            <?php echo $miserrores; ?> 
                        </p>
                    </div>
                </div>
            <?php }
            ?>
            <div class="row">
                <div class="row">
                    <div class="input-field col s6">
                        <label class="active">* Codigo Insumo</label>
                        <input id="ins_id" type="text" class="validate required" name="ins_id" data-error=".errorTxt1" length="10">
                        <div class="errorTxt1"></div>
                        <span class="help-block">
                            Por favor digite el codigo del insumo a registrar, recuerde que el <code>codigo del insumo</code> 
                            debe corresponder al siguiente patron: <code>001 &oacute; ab001</code>
                        </span>
                    </div>
                    <div class="input-field col s6">
                        <label class="active">* Nombre Insumo</label>
                        <input id="ins_nombre" type="text" class="validate required" name="ins_nombre" data-error=".errorTxt2" length="20" >
                        <div class="errorTxt2"></div>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s6">
                        <label class="active">* Descripcion</label>
                        <input id="ins_descripcion" type="text" class="validate" name="ins_descripcion" >
                    </div>
                    <div class="input-field col s12 m6">
                        <label for="pag_unidad_medida" class="active" >* Unidad de medida: </label>
                        <select  name="umed_id" class="error browser-default valid select2" data-error=".errorTxt3" id="umed_id" >
                            <?php
                            foreach ($umeds as $umed) {

                                echo "<option  value='" . $umed['umed_id'] . "'>" . $umed['umed_descripcion'] . "</option>";
                            }
                            ?>
                            <div class="input-field">
                                <div class="errorTxt3"></div>
                            </div>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12 m6">
                        <label for="last_name">* Valor</label>
                        <input id="ins_valor" type="text" class="validate"  data-error=".errorTxt4" name="ins_valor" >
                        <div class="errorTxt2"></div>
                    </div>
                </div>
                <div class="col s12 m12">
                    <button name="action" type="submit" class="btn teal waves-effect waves-light right animated infinite rubberBand">Crear insumo
                        <i class="mdi-content-add left"> </i>
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>




