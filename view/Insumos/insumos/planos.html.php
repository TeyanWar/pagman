<!-- BRYAN DAVID RAMOS MUÑOZ TADSI03-->
<div class="row">
    <div class="col s12 m12 l12">
        
            <div class="row">

                <h4 class="header">Cargar Insumos</h4>


               
                
                <?php $error=getErrores(); ?>
                <?php if (!$error=="") { ?>
                   <div id="card-alert" class="card red">
                       <div class="card-content white-text">
                           <p><i class="mdi-alert-error"></i> <?php echo $error; ?> </p>
                       </div>

                       <button type="button" class="close white-text" data-dismiss="alert" aria-label="Close">
                           <span aria-hidden="true">×</span>
                       </button>
                   </div>
                <?php } ?>


                <form name="form" class="col s12" action="<?php echo crearUrl("insumos", "insumos", "postPlanos") ?>" enctype="multipart/form-data" method="post" onsubmit="return validar(this)">

                    <div class="row">
                        <div class="col s12 m8 l9">
                            <label>(*) Archivo</label>
                            <div class="file-field input-field">
                                <div class="btn teal">
                                    <span>Importar</span>
                                    <input type="file" name="plano" >
                                </div>
                                <div class="file-path-wrapper">
                                    <input id="nombrearc" class="file-path validate" type="text">

                                </div>
                            </div>
                            

                        </div>
                    </div>

                    <div class="row">
                        <button name="action" type="submit" class="btn teal waves-effect waves-light right submit_ot animated infinite rubberBand">Registrar
                            <i class="mdi-content-add left"> </i>
                        </button>
                    </div>
                </form>

            </div>
        
    </div>
</div>

<script language="JavaScript">
    function validar(f){
        if((f.plano.value)==""){
            alert("Por favor importe un plano");
            return false;
        }
        return true;
    }
</script>