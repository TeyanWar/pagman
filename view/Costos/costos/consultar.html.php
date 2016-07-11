<!--Input Date Picker-->
<!---<div class="card panel">-->
<form action="#" id="formCostosAjax" method="post">
    <div class="card-panel">
        <div class="row">
            <div class="input-field col s5 l2">
                <input placeholder="AAAA-MM-DD" type="date" name="fecha_ini" class="validate">
                <label for="first_name" class="active">Fecha Inicial</label>
            </div>
            <div class="input-field col s5 l2">
                <input type="date" name="fecha_fin" class="validate">
                <label for="first_name" class="active">Fecha Final</label>
            </div>
            <div class="input-field col s5 l2">
                    <div class="select-wrapper initialized"><ul id="select-options-177b3364-796e-5d19-3355-fbedd398c11f" class="dropdown-content select-dropdown" style="width: 300px; position: absolute; top: 0px; left: 0px; opacity: 1; display: none;"><li class="disabled"></li><li class=""></li></ul>
                        <select class="initialized" name="equipo">
                            <option value="0">Todos</option>
                            <?php
                                foreach($equipos as $equipo){
                                echo "<option value=".$equipo["equi_noplaca"].">".$equipo['equi_nombre']."</option>";
                                }
                            ?>
                        </select>
                    </div>
                
                <label for="first_name" class="active">Equipo</label>
            </div>    
            <div class="input-field col s5 l2">
                    <div class="select-wrapper initialized"><ul id="select-options-177b3364-796e-5d19-3355-fbedd398c11f" class="dropdown-content select-dropdown" style="width: 300px; position: absolute; top: 0px; left: 0px; opacity: 1; display: none;"><li class="disabled"></li><li class=""></li></ul>
                        <select class="initialized" name="mantenedor">
                            <option value="">Todos</option>
                            <?php
                                foreach($mantenedores as $mantenedor){
                                echo "<option value=".$mantenedor[0].">".$mantenedor['mantenedor']."</option>";
                                }
                            ?>
                        </select>
                    </div>
                
                <label for="first_name" class="active">Mantenedor</label>
            </div>    
            <div class="input-field col s3" data-url="<?php echo crearUrl('costos', 'costos', 'reporteCostos', array("noVista"=>"noVista")) ?>" id="filtroFecha" >
                <input type="submit" value="Aplicar"  
                       class="btn waves-effect waves-light col s12">
            </div>
        </div>
    </div>
</form>

<div class="card-panel">
    <div id="striped-table">

            <div class="row">

                <div class="col s12 m8 l12" id="respuestaCostos">
                    No hay Resultados
                </div>
            </div>
        </div>
    </div>
<!--</div>-->

