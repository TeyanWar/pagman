<div class="row">
     <form class="col s12">
         <center>  <h5> Ver Detalle </h5></center>
         <br><br>
            <div class="row">
             
                <div class="input-field col s4">
                    <input readonly=""  type="text" id="dept_id" class="validate" value="<?php echo $departamento['dept_id'] ?>">
                    <label  style="color:#448aff;" for="dept_id" class="active">Codigo de departamento:</label>
                </div>
                <div class="input-field col s4">
                    <input readonly=""  type="text" id="dept_nombre" class="validate"  value="<?php echo $departamento['dept_nombre'] ?>">
                    <label style="color:#448aff;" for="dept_nombre" class="active" >Nombre departamento :</label>
                    
                </div>
                <div class="input-field col s4">
                    <input readonly  type="text" id="reg_nombre" class="validate"  value="<?php echo $departamento['reg_nombre'] ?>">
                    <label style="color:#448aff;"  for="reg_id" class="active" >Nombre regional :</label>

                </div>
                
            </div>
            
       
    </form>
</div>

