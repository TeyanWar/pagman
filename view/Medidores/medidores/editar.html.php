<div class="col s12 m12 l6">
        <h4 class="header2">Modificar Tipo de Medidor</h4> 
        <form action="<?php echo crearUrl("medidores", "medidores", "postEditar") ?>" method="post">
            
            <div class="row">
                <div class="col s6">
                    <label for="nombre">Nombre del Medidor</label>
                    <input id="nombre" name="tmed_nombre" type="text" class="validate" value="<?php echo $medidores['tmed_nombre'] ?>">	
                </div>

                <div class=" col s6">
                    <label for="acronimo">Acrónimo</label>
                    <input id="acronimo" name="tmed_acronimo" type="text" class="validate" length="3" value="<?php echo $medidores['tmed_acronimo'] ?>">

                </div>
            </div>
            <div class="row">
                <div class="col s6">
                    <label for="descripcion">Descripción</label>
                    <textarea id="descripcion" name="tmed_descripcion" class="materialize-textarea" length="500"><?php echo $medidores['tmed_descripcion'] ?></textarea>
                </div>

                <div class="col s3">
                    <select class="select2" name="tmed_estado" id="estado" value="<?php $medidores['tmed_estado'] ?>">
                        <option value="Activo">Activo</option>
                        <option value="Inactivo">Inactivo</option>
                    </select>
                    <label class="active">Estado</label>
                </div>
            </div>

            <input type="hidden" name="id" value="<?php echo $medidores['tmed_id'] ?>">

            <button class="btn cyan waves-effect waves-light" type="submit" name="action">Actualizar
                <i class="mdi-content-send"></i>
            </button>
        </form>
</div>
<script>
    $('select').material_select();
</script>

<script type="text/javascript">
    $(".modal-trigger").leanModal({
        dismissible: true,
        opacity: .5,
        in_duration: 300,
        out_duration: 200,
        ready: function () {

        },
        complete: function () {

        }
    });
</script>