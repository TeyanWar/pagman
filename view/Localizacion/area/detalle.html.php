<div class="card-panel">
    <center>
    <?php include 'templates/adminMaterialize/estandarSena.html.php'; ?>    
</center>
<br>
    <table class="striped">
        <thead>
            <tr>
                <th>
                    <label style="color: #448aff;"><h6> Codigo de la Ciudad:</h6></label> 
                </th>
                <th>
                    <label style="color: #448aff;"><h6>Nombre de la Ciudad:</h6></label> 
                </th>
                <th>
                    <label style="color: #448aff;"><h6>Departamento:</h6></label> 
                </th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                    <?php echo $ciudades['ciud_id']; ?>
                </td>
                <td>
                    <?php echo $ciudades['ciud_nombre']; ?>
                </td>
                <td>
                    <?php echo $ciudades['dept_nombre']; ?>
                </td>
            </tr>
        </tbody>
    </table>    

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
        ready: function () {

        },
        complete: function () {

        }
    });
</script>
