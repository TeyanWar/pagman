<?php

include_once '../../../../lib/php/helper.php';
include_once '../../../../lib/php/global.php';

$status = $_SERVER['REDIRECT_STATUS'];
$codes = array(
       403 => array('403 Forbidden', 'The server has refused to fulfill your request.'),
       404 => array('404 Not Found', 'El documento/archivo solicitado no se encontr&oacute; en este servidor.'),
       405 => array('405 Method Not Allowed', 'The method specified in the Request-Line is not allowed for the specified resource.'),
       408 => array('408 Request Timeout', 'Your browser failed to send a request in the time allowed by the server.'),
       500 => array('500 Internal Server Error', 'The request was unsuccessful due to an unexpected condition encountered by the server.'),
       502 => array('502 Bad Gateway', 'The server received an invalid response from the upstream server while trying to fulfill the request.'),
       504 => array('504 Gateway Timeout', 'The upstream server failed to send a request in the time allowed by the server.'),
);

$title = $codes[$status][0];
$message = $codes[$status][1];
if ($title == false || strlen($status) != 3) {
       $message = 'Error desconocido, consulte con soporte.';
}
// Insert headers here
//echo '<h1>'.$title.'</h1>
//<p>'.$message.'ddd</p>';

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="msapplication-tap-highlight" content="no">
  <meta name="description" content="Materialize is a Material Design Admin Template,It's modern, responsive and based on Material Design by Google. ">
  <meta name="keywords" content="materialize, admin template, dashboard template, flat admin template, responsive admin template,">
  <title><?php echo $title." | ".NOMBRE_APLICATIVO; ?></title>

  <!-- Favicons-->
  <link rel="icon" href="<?php echo addLibErrors('templates/adminMaterialize/images/favicon/favicon-32x32.png') ?>" sizes="32x32">
  <!-- Favicons-->
  <link rel="apple-touch-icon-precomposed" href="<?php echo addLibErrors('templates/adminMaterialize/images/favicon/apple-touch-icon-152x152.png') ?>">
  <!-- For iPhone -->
  <meta name="msapplication-TileColor" content="#00bcd4">
  <meta name="msapplication-TileImage" content="<?php echo addLibErrors('templates/adminMaterialize/images/favicon/mstile-144x144.png') ?>">
  <!-- For Windows Phone -->


  <!-- CORE CSS-->
  <link href="<?php echo addLibErrors('templates/adminMaterialize/css/materialize.css') ?>" type="text/css" rel="stylesheet" media="screen,projection">
  <link href="<?php echo addLibErrors('templates/adminMaterialize/css/style.css') ?>" type="text/css" rel="stylesheet" media="screen,projection">
  <!-- Custome CSS-->    
  <link href="<?php echo addLibErrors('templates/adminMaterialize/css/custom/custom.css') ?>" type="text/css" rel="stylesheet" media="screen,projection">
  <link href="<?php echo addLibErrors('templates/adminMaterialize/css/layouts/style-fullscreen.css') ?>" type="text/css" rel="stylesheet" media="screen,projection">

  <!-- INCLUDED PLUGIN CSS ON THIS PAGE -->
  <link href="<?php echo addLibErrors('templates/adminMaterialize/js/plugins/prism/prism.css') ?>" type="text/css" rel="stylesheet" media="screen,projection">
  <link href="<?php echo addLibErrors('templates/adminMaterialize/js/plugins/perfect-scrollbar/perfect-scrollbar.css') ?>" type="text/css" rel="stylesheet" media="screen,projection">
  <link href="<?php echo addLibErrors('templates/adminMaterialize/js/plugins/chartist-js/chartist.min.css') ?>" type="text/css" rel="stylesheet" media="screen,projection">
  
</head>

<body class="cyan">
  <!-- Start Page Loading -->
<!--  <div id="loader-wrapper">
      <div id="loader"></div>        
      <div class="loader-section section-left"></div>
      <div class="loader-section section-right"></div>
  </div>-->
  <!-- End Page Loading -->

  <div id="error-page">
    <div class="row">
      <div class="col s12">
        <div class="browser-window">
          <div class="top-bar">
            <div class="circles">
              <div id="close-circle" class="circle"></div>
              <div id="minimize-circle" class="circle"></div>
              <div id="maximize-circle" class="circle"></div>
            </div>
          </div>
          <div class="content">
            <div class="row">
              <div id="site-layout-example-top" class="col s12">
                  <p class="flat-text-logo center white-text caption-uppercase">Lo sentimos, pero no pudimos encontrar la p&aacute;gina :(</p>
              </div>
              <div id="site-layout-example-right" class="col s12 m12 l12">
                <div class="row center">
                  <h1 class="text-long-shadow col s12"><?php echo $title; ?></h1>
                </div>
                <div class="row center">
                  <p class="center white-text col s12"><?php echo $message; ?></p>
                  <p class="center s12"><button onclick="goBack()" class="btn waves-effect waves-light">Regresar</button> <a href="index.php" class="btn waves-effect waves-light">Homepage</a>
                    <p>
                    </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- ================================================
    Scripts
    ================================================ -->

  <!-- jQuery Library -->
  <script type="text/javascript" src="<?php echo addLibErrors('templates/adminMaterialize/js/plugins/jquery-1.11.2.min.js') ?>"></script>
  <!--materialize js-->
  <script type="text/javascript" src="<?php echo addLibErrors('templates/adminMaterialize/js/materialize.js') ?>"></script>
  <!--prism -->
  <script type="text/javascript" src="<?php echo addLibErrors('templates/adminMaterialize/js/plugins/prism/prism.js') ?>"></script>
  <!--scrollbar-->
  <script type="text/javascript" src="<?php echo addLibErrors('templates/adminMaterialize/js/plugins/perfect-scrollbar/perfect-scrollbar.min.js') ?>"></script>

      <!--plugins.js - Some Specific JS codes for Plugin Settings-->
    <script type="text/javascript" src="<?php echo addLibErrors('templates/adminMaterialize/js/plugins.js') ?>"></script>
    <!--custom-script.js - Add your own theme custom JS-->
    <script type="text/javascript" src="<?php echo addLibErrors('templates/adminMaterialize/js/plugins.js') ?>js/custom-script.js"></script>
  
  <script type="text/javascript">
    function goBack() {
      window.history.back();
    }
  </script>
</body>

</html>