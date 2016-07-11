<!-- ================================================
    Scripts
    ================================================ -->

  <!-- jQuery Library -->
  <script type="text/javascript" src="<?php echo addLib('templates/adminMaterialize/js/plugins/jquery-1.11.2.min.js')?>"></script>
  <!--materialize js-->
  <script type="text/javascript" src="<?php echo addLib('templates/adminMaterialize/js/materialize.js')?>"></script>
  <!--prism-->
  <script type="text/javascript" src="<?php echo addLib('templates/adminMaterialize/js/plugins/prism/prism.js')?>"></script>
  <!--scrollbar-->
  <script type="text/javascript" src="<?php echo addLib('templates/adminMaterialize/js/plugins/perfect-scrollbar/perfect-scrollbar.min.js')?>"></script>

      <!--plugins.js - Some Specific JS codes for Plugin Settings-->
    <script type="text/javascript" src="<?php echo addLib('templates/adminMaterialize/js/plugins.js')?>"></script>
    <!--custom-script.js - Add your own theme custom JS-->
    <script type="text/javascript" src="<?php echo addLib('templates/adminMaterialize/js/custom-script.js')?>"></script>

<!-- Scripts personalizados --> 

<!-- Scripts para SELECT2--> 
<script type="text/javascript" src="<?php echo addLib('js/select2.full.min.js') ?>"></script>
<script type="text/javascript">
    $('.select2').select2({
        placeholder: 'Buscar...'
    });
</script>

<script type="text/javascript" src="<?php echo addLib('js/global.js') ?>"></script>

  <script type="text/javascript">
    
    <?php if($_GET['ini']=="false"){ ?>
      Materialize.toast('Error de Informacion', 2000,'rounded col red');
    <?php } ?>

  </script>

</body>

</html>