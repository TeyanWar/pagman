
<div >


    <div class="row">

        <div class="col s12 m12 l12">
            <div class="card-panel">
                <table class="bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Placa</th>
                            <th colspan="2">Descripci&oacute;n</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $count = 1;
                        foreach ($equipos as $equipo) {
                            ?>
                            <tr>
                                <td><?php echo $count++ ?></td>
                                <td ><input type="hidden" class="co" value="<?php echo $equipo['equi_id'] ?>"><?php echo $equipo['equi_id'] ?></td>
                                <td ><input type="hidden" class="col" value="<?php echo $equipo['equi_nombre'] ?>"><?php echo $equipo['equi_nombre'] ?></td>
                                <td><a  class="modal-trigger" href="#mod" data-url="<?php echo crearUrl('Programacion', 'programacion', 'tablas', array('noVista' => "noVista",'id'=>$equipo['equi_id'])) ?>">Agregar</a></td>

                            </tr>
                        <?php } ?>
                            
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
$(".modal-trigger").leanModal({
    dismissible:true,
    opacity:.5,
    in_duration:300,
    out_duration:200,
    ready:function(){
        
    },
    complete:function(){
        
    }
});
</script>
