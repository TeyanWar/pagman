<div id="login-page" class="row">
    <div class="col s12 z-depth-4 card-panel">
      <form class="login-form" id="formLoginAjax"action="<?php echo crearUrl("sesion", "sesion", "postInicio")?>" method="post">
        <div class="row">
          <div class="input-field col s12 center">
            <img src="<?php echo addLib('templates/adminMaterialize/images/login-logo.png') ?>" alt="" class="circle responsive-img valign profile-image-login">
            <p class="center login-form-text">Inicio Sesion PAGMAN</p>
          </div>
        </div>
        <div class="row margin">
          <div class="input-field col s12">
            <i class="mdi-social-person-outline prefix"></i>
            <input id="username" name="nom_usu" type="text" value="" required="Por favor Ingresa nombre de Usuario">
            <label for="username" class="active">Usuario</label>
          </div>
        </div>
        <div class="row margin">
          <div class="input-field col s12">
            <i class="mdi-action-lock-outline prefix"></i>
            <input id="password" name="pass_usu" type="password" value="" required="Por favor Ingresa la contraseña">
            <label for="password" class="active">Contrase&ntilde;a</label>
          </div>
        </div>
        <div class="row">          
          <div class="input-field col s12 m12 l12  login-text">
              <input type="checkbox" id="remember-me" />
              <label for="remember-me">Recordar Usuario</label>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s12" id="loginAjax">
             <input type="button"  value="ENTRAR" class="btn waves-effect waves-light col s12">
          </div>
        </div>
        <div class="row">
          <div class="input-field col s7 m7 l8">
              <p class="margin right-align medium-small"><a href="<?php echo addLib("index.php/recordar")?>">&iquest;Olvidaste tu contrase&ntildea?</a></p>
          </div>          
        </div>

      </form>
    </div>
  </div>

