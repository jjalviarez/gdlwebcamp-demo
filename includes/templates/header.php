<!doctype html>
<html class="no-js" lang="">

<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>GDLWEBCAM</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="manifest" href="site.webmanifest">
  <link rel="apple-touch-icon" href="icon.png">
  <!-- Place favicon.ico in the root directory -->

  <link rel="stylesheet" href="css/normalize.css">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans|Oswald|PT+Sans" rel="stylesheet">

  <?php
  $archivo = basename($_SERVER['PHP_SELF']);
  $pagina = str_replace(".php", "", $archivo);
  if ($pagina == "invitados" || $pagina == "index") {
    echo '<link rel="stylesheet" href="css/colorbox.css">';
  } else if ($pagina == "conferencia" ){
    echo '<link rel="stylesheet" href="css/lightbox.css">';
  }
  ?>

  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">  <!-- NOTE: de esta forma estan  los iconos en linea -->
  <!-- NOTE:<link rel="stylesheet" href="css/all.min.css"> --> <!-- NOTE: de esta forma es local  -->
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.4.0/dist/leaflet.css" />
  <link rel="stylesheet" href="css/main.css">
</head>

<body class="<?php echo $pagina ?>">
  <!--[if lte IE 9]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
  <![endif]-->

  <!-- Add your site or application content here -->

  <header class="site.header">
    <div class="hero">
      <div class="contenido-header">
        <nav class="redes-sociales">
          <a href="#"><i class="fab fa-facebook"></i></a>
          <a href="#"><i class="fab fa-twitter"></i></a>
          <a href="#"><i class="fab fa-pinterest"></i></a>
          <a href="#"><i class="fab fa-youtube"></i></a>
          <a href="#"><i class="fab fa-instagram"></i></a>
        </nav>
        <div class="informacion-evento">
          <div class="clearfix">
            <p class="fecha"><i class="fas fa-calendar"></i> 10-12 Dic</p>
            <p class="ciudad"><i class="fas fa-map-marker-alt"></i>Panama,PA</p>
          </div>
          <h1 class="nombre-sitio">GdlwebCamp</h1>
          <p class="slogan">la mejor conferencia de <span>diseño web</span> </p>
        </div>  <!-- NOTE: informacion evento -->
      </div>

    </div> <!-- NOTE: hero -->
  </header>
  <div class="barra">
    <div class="contenedor clearfix">


      <div class="logo">
        <a href="index.php">
          <img src="img/logo.svg" alt="Logo GdlwebCam">
        </a>
      </div>


      <div class="menu-movil ">
        <span></span>
        <span></span>
        <span></span>
      </div>



      <nav class="navegacion-principal clearfix">
        <a href="conferencia.php">Conferencia</a>
        <a href="calendario.php">Calendario</a>
        <a href="invitados.php">Invitados</a>
        <a href="registro.php">Reservaciones</a>
      </nav>

    </div> <!-- NOTE: cierre contenedor -->

  </div> <!-- NOTE: cierre Barra -->
