<div class="col s12 m12 l6">
    <div class="card-panel">
        <h4 class="header2"> Editar Solicitud de Prestamo </h4>
        <div class="row">
            <form class="form-horizontal" role="form" action="<?php echo crearUrl("prestamo", "prestamo", "postEditar") ?>" method="post">

                <div class="row">
                    <div class="input-field col s6">
                        <label for="pher_id" class="active">codigo prestamo</label>
                        <input type="text" class="form-control" id="pher_id" name="pher_id" readonly="" value="<?php echo $prestamo['pher_id'] ?>">
                    </div>
                    <div class="input-field col s6">
                        <label for="pher_fecha"> Fecha inicio prestamo </label>
                        <input name="pher_fecha" type="date" id="pher_fecha" class="form-control datepicker" value="<?php echo $prestamo['pher_fecha'] ?>">
                    </div>
                    <div class="input-field col s6">
                        <label for="pher_observaciones" class="active">Observaciones generales</label>
                        <input type="text" class="form-control" id="pher_observaciones" name="pher_observaciones"value="<?php echo $prestamo['pher_observaciones'] ?>">
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <label for="jor_id" class="active">Nombre de la jornada</label>
                        <input type="text" id="jor_id" class="form-control" name="jor_id" value="<?php echo $prestamo['jor_id'] ?>">
                    </div>
                </div>
                <!-- Campo para almacenar el id de la herramienta -->
                <input type="hidden" name="id" value="<?php echo $prestamo['pher_id'] ?>">

                <!--botonera de la ventana de editar-->
                <div class="row center" >
                    <div class="input-field col  m3 "></div>
                    <div class="input-field col  m3 "> 
                        <button type="button" class="btn teal waves-effect waves-light right animated infinite rubberBand cerrar" value="">Cancelar</button>
                    </div>
                    <div class="input-field col  m3"> 
                        <button type="submit" class="btn teal waves-effect waves-light right animated infinite rubberBand" value="submit" >Actualizar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

