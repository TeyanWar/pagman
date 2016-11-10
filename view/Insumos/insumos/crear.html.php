<!-- BRYAN DAVID RAMOS MUÑOZ TADSI03-->

<div class="col s12 m12">

    <div class="card-panel">
        <h4 class="header2">Registrar insumo</h4>

        <ol class="breadcrumbs">
            <li><a href="<?php echo addLib('') ?>">Panel de control</a></li>
            <li><a href="#">Inventario</a></li>
            <li><a href="#">Insumos</a></li>
            <li class="active">Registrar insumo</li>
        </ol>

        <div class="row">
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
            $mierror = getErrores();
            if (!$mierror == "") {
                ?>
                <div id="card-alert" class="card red">
                    <div class="card-content white-text">
                        <p><i class="mdi-alert-error"></i>
                            <?php echo ($mierror); ?>
                        </p>
                    </div>
                    <button type="button" class="close white-text" data-dismiss="alert" aria-lable="close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
            <?php } ?>
        </div>

        <div class="row">
            <form id="formValidate" class="col s12 m12 l12" action="<?php echo crearUrl("insumos", "insumos", "postCrear") ?>" method="POST">
                <div class="row">
                    <div class="input-field col s12 m6">
                        <input id="ins_nombre" type="text" class="form-control" name="ins_nombre">
                        <label for="ins_nombre">* Nombre Insumo</label>
                    </div>
                    <div class="input-field col s12 m6">
                        <input id="ins_descripcion" type="text" class="form-control" name="ins_descripcion" >
                        <label for="ins_descripcion">* Descripcion</label>
                    </div>
                    <div class="input-field col s12 m6">
                        <label for="pag_unidad_medida" class="active" >* Unidad de medida: </label>
                        <select  name="umed_id" class="select2" >
                            <?php
                            foreach ($umeds as $umed) {

                                echo "<option  value='" . $umed['umed_id'] . "'>" . $umed['umed_descripcion'] . "</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="input-field col s12 m6">
                        <input id="last_name" type="text" class="validate" name="ins_valor" >
                        <label for="last_name">* Valor</label>
                    </div>
                </div>

                <div class="col s12 m12">
                    <button name="action" type="submit" class="btn teal waves-effect waves-light right animated infinite rubberBand">Crear insumo
                        <i class="mdi-content-add left"> </i>
                    </button>
                    <i class="btn teal waves-effect waves-light modal-trigger" href="#plano" data-url="<?php echo crearUrl('insumos', 'insumos', 'planos', array('noVista' => "noVista")) ?>" > IMPORTAR </i>
                </div>
            </form>
        </div>
    </div>

    <div class="modal" id="plano" style="display: none; opacity: 1; top: 0px;">
        <div class="modal-content" id="model-data"></div>
    </div>

</div>

<script>
    $(document).ready(function () {
        // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
        $('.modal-trigger').leanModal();
    });
</script>
