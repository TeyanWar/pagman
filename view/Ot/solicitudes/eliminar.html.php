<!--Input Select-->
<div class="col s12 m12 l12">
    <form class="col s12" method="POST" action="<?php echo crearUrl("Ot", "solicitudes", "postEliminar", array('noVista' => 'noVista', 'sserv_id' => $eliminar['sserv_id'])) ?>">
        <h5 class="header">¿Está seguro que desea eliminar este registro?</h5>
        <div class="row">
            <div class="input-field col s12 m4 l4">
                <input type="text" name="sserv_id" value="<?php echo $eliminar['sserv_id'] ?>" disabled="" readonly>
                <label class="active">Código solicitud</label>                    
            </div>

            <div class="input-field col s12 m4 l4">
                <input type="text" name="reg_id" value="<?php echo $eliminar['reg_id'] ?>" disabled="" readonly>
                <label class="active">Regional</label>                    
            </div>

            <div class="input-field col s12 m4 l4">
                <input type="text" name="cen_id" value="<?php echo $eliminar['cen_id'] ?>" disabled="" readonly>
                <label class="active">Centro de formación</label>                    
            </div>  
        </div>                          

        <div class="row">
            <div class="input-field col s12 m4 l4">                    
                <input type="text" name="tipo_falla" value="<?php echo $eliminar['tfa_id'] ?>" disabled="" readonly>
                <label class="active">Tipo de falla</label>                     
            </div>

            <div class="input-field col s12 m4 l4">                    
                <input type="text" name="per_id_solicitante" value="<?php echo $eliminar['per_id'] ?>" disabled="" readonly>
                <label class="active">Solicitante</label>
            </div>
            
            <div class="input-field col s12 m4 l4">                    
                <input type="text" name="est_id" value="<?php echo $eliminar['est_id'] ?>" disabled="" readonly>
                <label class="active">Estado</label>
            </div>
            
            <div class="input-field col s12 m8 l8">
                <input type="text" name="sserv_id" value="<?php echo $eliminar['sserv_descripcion'] ?>"  disabled="" readonly>
                <label class="active">Descripcion</label>                    
            </div>
        </div>
        <div class="input-field col m2 offset-m8 center"> 
            <button type="submit" class="btn blue " value="submit" >Cancelar</button>
        </div>
        <div class="input-field col m2 offset-m8 center"> 
            <button type="submit" class="btn blue " value="submit" >Eliminar</button>
        </div>
    </form>            
</div>
