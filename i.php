<!--
<html lang="en">
  <head>
    <meta name="google-signin-scope" content="profile email">
    <meta name="google-signin-client_id" content="YOUR_CLIENT_ID.apps.googleusercontent.com">
    <script src="https://apis.google.com/js/platform.js" async defer></script>
  </head>
  <body>
    <div class="g-signin2" data-onsuccess="onSignIn" data-theme="dark"></div>
    <script>
      function onSignIn(googleUser) {
        // Useful data for your client-side scripts:
        var profile = googleUser.getBasicProfile();
        console.log("ID: " + profile.getId()); // Don't send this directly to your server!
        console.log('Full Name: ' + profile.getName());
        console.log('Given Name: ' + profile.getGivenName());
        console.log('Family Name: ' + profile.getFamilyName());
        console.log("Image URL: " + profile.getImageUrl());
        console.log("Email: " + profile.getEmail());

        // The ID token you need to pass to your backend:
        var id_token = googleUser.getAuthResponse().id_token;
        console.log("ID Token: " + id_token);
      }
    </script>
  </body>
</html>
NOTE: talleres -->
<?php
    try {
      require_once("includes/funciones/bd_conexion.php");
      $sql =  "select evento_id, nombre_evento, fecha_evento, hora_evento, cat_evento, icono, nombre_invitado, apellido_invitado from eventos inner join categoria_evento on eventos.id_cat_evento = categoria_evento.id_categoria inner join invitados on eventos.id_inv = invitados.invitado_id and eventos.id_cat_evento = 1 order by evento_id LIMIT 2;";
      $sql .= "select evento_id, nombre_evento, fecha_evento, hora_evento, cat_evento, icono, nombre_invitado, apellido_invitado from eventos inner join categoria_evento on eventos.id_cat_evento = categoria_evento.id_categoria inner join invitados on eventos.id_inv = invitados.invitado_id and eventos.id_cat_evento = 2 order by evento_id LIMIT 2;";
      $sql .= "select evento_id, nombre_evento, fecha_evento, hora_evento, cat_evento, icono, nombre_invitado, apellido_invitado from eventos inner join categoria_evento on eventos.id_cat_evento = categoria_evento.id_categoria inner join invitados on eventos.id_inv = invitados.invitado_id and eventos.id_cat_evento = 3 order by evento_id LIMIT 2;";
      //$res = $conn->query($sql);

    } catch (\Exception $e) {
      echo $e->getMessage();
    }
    $conn->multi_query($sql);
    $programa = array();
    do {
      $result = $conn->store_result();
      $res = $result->fetch_all(MYSQLI_ASSOC);
      foreach ($res as $even) {
        $categoia=  $even["cat_evento"];
        $evento = array(
          'titulo' => $even["nombre_evento"] ,
          'fecha' => $even["fecha_evento"] ,
          'hora' => $even["hora_evento"] ,
          'categoia' => $even["cat_evento"] ,
          'icono' => $even["icono"] ,
          'invitado' => $even["nombre_invitado"] . " " . $even["apellido_invitado"]
        );
        $programa[$categoia][]= $evento;
      }
    } while ($conn->next_result() || $conn->more_results());
    foreach ($programa as $tipo_evento => $lista_eventos) {
      echo "<h3>";

      echo '<p>';
       echo $tipo_evento;
       //ar_dump($evento);
       echo "</p>";

      foreach ($lista_eventos as $evento ) {
        echo '<div class="dia">';
        echo '<p class="titulo" >';
         echo $evento["titulo"];
         //ar_dump($evento);
         echo "</p>";
         echo '<p class="hora" >';

         echo '<i class="fa fa-calendar" aria-hiden="true"></i>';
         //UNIX
         setlocale(LC_TIME, 'es_ES.UTF-8');
         //Windows
         //setlocale(LC_TIME, "spanish");
         //echo date("F j, Y", strtotime($dia)); //no acepta formateo de fecha
         echo strftime("%A, %d de %b del %Y", strtotime($evento["fecha"])); //si acepta formateo de fecha
          echo ' ' . '<i class="fa fa-clock" aria-hiden="true"></i> ';
          echo  " " . $evento["hora"];
          echo "</p>";

          echo '<p>';
           echo '<i class="fa fa-user" aria-hiden="true"></i> ';
           echo $evento["invitado"];
           echo "</p>";


        echo "</div>";
      }
    }
    ?>
