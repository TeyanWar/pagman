
<center>
    <?php include 'templates/adminMaterialize/estandarEditarSena.html.php'; ?>    
</center>
<br>
<head>
    <link href="<?php echo addLib('css/select2.css') ?>" rel="stylesheet" type="text/css">
</head>
<div class="col s12 m12 l6">
    <div class="card-panel">
        <h4 class="header2">Modificar insumo</h4>
        <div class="row">
            <form id="formValidate" class="centered form-horizontal" action="<?php echo crearUrl("insumos", "insumos", "postEditar") ?>" method="post">
                <div class="row">
                    <div class="input-field col s6">
                        <label class="active" for="ins_id">Codigo Insumo</label>
                        <input type="text" class="form-control" id="ins_id" name="ins_id" readonly="" value="<?php echo $insumo['ins_id']; ?>">
                    </div>
                    <div class="input-field col s6">
                        <label class="active" for="ins_nombre">Nombre Insumo</label>
                        <input id="ins_nombre" type="text" class="form-control" name="ins_nombre" value="<?php echo $insumo['ins_nombre']; ?>" >
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s6">
                        <label class="active" for="ins_valor">Valor</label>
                        <input id="ins_valor" type="text" class="form-control" name="ins_valor" value="<?php echo $insumo['ins_valor']; ?>" >
                    </div>
                    <div class="input-field col s6">
                        <label for="pag_unidad_medida" class="active" >* Unidad de medida: </label>
                        <select class="select2" name="umed_id" id="umed_id" >
                            <?php
                            foreach ($umeds as $umed) {

                                echo "<option  value='" . $umed['umed_id'] . "'>" . $umed['umed_descripcion'] . "</option>";
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <label class="active" for="ins_descripcion">Descripcion</label>
                        <input id="ins_descripcion" type="text" name="ins_descripcion" value="<?php echo $insumo['ins_descripcion']; ?>" >
                    </div>
                </div>

                <!-- Campo para almacenar el id de la herramienta -->
                <input type="hidden" name="id" value="<?php echo $insumo['ins_id'] ?>" />

                <!--botonera de la ventana de editar-->
                <div class="row center">
                    <div class="input-field col  m3 "></div>
                    <div class="input-field col  m3 "> 
                        <button name="action" type="submit" class="btn teal waves-effect waves-light right  animated infinite rubberBand">Actualizar
                            <i class="mdi-content-create left"> </i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script type="text/javascript" src="<?php echo addLib('js/select2.full.min.js') ?>"></script>
<script type="text/javascript">
    $(".select2").select2({});
</script>
<script>
    $("#formValidate").validate({
        rules: {
            ins_id: {
                required: true,
                number: true
            },
            ins_nombre: {
                required: true
            },
            ins_descripcion: {
                required: true,
            },
            umed_id: {
                required: true
            },
            ins_valor: {
                required: true
            }
        },
        //For custom messages
        messages: {
            ins_id: {
                required: "Ingrese codigo insumo",
                number: "Solo se admiten numeros"
            },
            ins_nombre: {
                required: "Ingrese nombre"
            },
            ins_descripcion: {
                required: "Ingrese descripcion "
            },
            umed_id: {
                required: "Ingrese unidad de mendida"
            },
            ins_valor: {
                required: "Ingrese valor",
                number: "Solo se admiten numeros"
            },
            curl: "Enter your website"
        },
        errorElement: 'div',
        errorPlacement: function (error, element) {
            var placement = $(element).data('error');
            if (placement) {
                $(placement).append(error)
            } else {
                error.insertAfter(element);
            }
        }
    });
</script>