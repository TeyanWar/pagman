<div class="row">
     <form class="col s12">
         <center> <h5 class="header2"> Ver Detalle </h5></center>
         <br>
         <br>
         
            <div class="row">
             
                <div class="input-field col s4">
                    <input readonly=""  type="text" id="ciud_id" class="validate" value="<?php echo $ciudad['ciud_id'] ?>">
                    <label style="color:#448aff;" for="ciud_id" class="active">Codigo de ciudad:</label>
                </div>
                <div class="input-field col s4">
                    <input readonly=""  type="text" id="ciud_nom" class="validate"  value="<?php echo $ciudad['ciud_nombre'] ?>">
                    <label style="color:#448aff;" for="ciud_nombre" class="active" >Nombre ciudad :</label>
                    
                </div>
                <div class="input-field col s4">
                    <input readonly  type="text" id="dept_nombre" class="validate"  value="<?php echo $ciudad['dept_nombre'] ?>">
                    <label style="color:#448aff;"  for="dept_id" class="active" >Nombre departamento :</label>

                </div>
                
            </div>
            
       
    </form>
</div>

