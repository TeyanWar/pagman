<div class="row">
    <div class="col s6">
        <div class="card-panel ">            
            <table class="striped">
                <thead>
                    <tr>
                        <th data-field="id">Código</th>
                        <th data-field="name">Nombre</th>
                        <th data-field="cantidad">Cantidad</th>                        
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        <td><input name="ins_id" value="<?php echo ($agregarInsumo['ins_id']) ?>" ></td>
                        <td><input name="ins_nombre" value="<?php echo ($agregarInsumo['ins_nombre']) ?>"> </td>                        
                        <td><input name="cant" value="<?php echo $cant ?>"> </td>                        
                    </tr>                    
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="modal" id="modal_editar" style="z-index: 1003; display: none; 
     opacity: 0; transform: scaleX(0.7); top: 341.06px; height: auto; width: 65%;" >  
    <div class="modal-content model-data"></div>
</div>

<div class="modal" id="modal_detalle" style="z-index: 1003; display: none; 
     opacity: 0; transform: scaleX(0.7); top: 341.06px; height: auto; width: 65%;" >   
<!--    <a class="btn-floating waves-effect waves-light brown right cerrar"><i class="mdi-content-clear"></i></a>-->
    <div class="modal-content model-data">

    </div>   
</div>
