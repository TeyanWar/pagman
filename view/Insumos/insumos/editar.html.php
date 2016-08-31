<script type="text/javascript" src="<?php echo addLib('js/select2.full.min.js') ?>"></script>
<script type="text/javascript">
    $(".select2").select2({});
</script>

<div class="col s12 m12">
    <h4 class="header2">Editar insumo</h4>

        <div class="row">
            <form class="col s12" action="<?php echo crearUrl("insumos", "insumos", "postEditar") ?>" method="post">

                <div class="input-field col s12 m12">
                    <input readonly="readonly" id="last_name"  type="text" class="validate" name="ins_id" value="<?php echo $insumo['ins_id']; ?>">
                    <label class="active" for="last_name">Codigo Insumo</label>
                </div>

                <div class="input-field col s12 m6">
                    <input id="last_name" type="text" class="validate" name="ins_nombre" value="<?php echo $insumo['ins_nombre']; ?>" >
                    <label class="active" for="last_name">Nombre Insumo</label>
                </div>

                <div class="input-field col s12 m6">
                    <input id="last_name" type="text" class="validate" name="ins_descripcion" value="<?php echo $insumo['ins_descripcion']; ?>" >
                    <label class="active" for="last_name">Descripcion</label>
                </div>

                <div class="input-field col s12 m6">
                    <select  name="umed_id" class="select2">
                        <?php
                        foreach ($umeds as $umed) {
                            ?>
                            <option value= "<?php echo $umed['umed_id'] ?>"><?php echo $umed['umed_descripcion'] ?> </option>
                        <?php } ?>
                    </select>
                </div>

                <div class="input-field col s12 m6">
                    <input id="last_name" type="text" class="validate" name="ins_valor" value="<?php echo $insumo['ins_valor']; ?>" >
                    <label class="active" for="last_name">Valor</label>
                </div>

                <div class="row">
                <button name="action" type="submit" class="btn teal waves-effect waves-light right  animated infinite rubberBand">Actualizar
                    <i class="mdi-content-create left"> </i>
                </button>
            </div>
            </form>
        </div>
   
</div>