<div class="card-panel">
    <div class="title center"><h5>Detalle Del Departamento </h5></div>
    <br>
    <div class="row">

        <div class="col s4">
            <label style="color: #448aff;"><h6>Codigo del Departamento:</h6></label> 
            <?php echo $departamento['dept_id']; ?>
        </div>

        <div class="col s4">
            <label style="color: #448aff;"><h6>Nombre del Departamento:</h6></label> 
            <?php echo $departamento['dept_nombre']; ?>
        </div>

        <div class="col s4">
            <label style="color: #448aff;"><h6>Regional:</h6></label> 
            <?php echo $departamento['reg_nombre']; ?>
        </div>

    <div class="row right" >

        <div class="input-field col  m3 "> 
            <button type="button" class="btn blue cerrar" value="">CERRAR</button>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(".modal-trigger").leanModal({

        dismissible: true,
        opacity: .5,
        in_duration: 300,
        out_duration: 200,
        ready: function() {

        },
        complete: function() {

        }
    });
