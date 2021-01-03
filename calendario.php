<?php include_once 'includes/templates/header.php'; ?>





  <section class="seccion contenedor" >
    <h2>Calendario de Eventos</h2>

    <?php
        try {
          require_once("includes/funciones/bd_conexion.php");
          $sql = "select evento_id, nombre_evento, fecha_evento, 	hora_evento, cat_evento, icono, nombre_invitado, apellido_invitado from eventos inner join categoria_evento on eventos.id_cat_evento = categoria_evento.id_categoria inner join invitados on eventos.id_inv = invitados.invitado_id order by fecha_evento";
          $res = $conn->query($sql);
        } catch (\Exception $e) {
          echo $e->getMessage();
        }
     ?>

     <div class="calendario">
       <?php
/*
       while ($eventos = $res->fetch_assoc()) {
        echo "<pre>";
        var_dump($eventos);
        echo "</pre>";
       }

*/
/*

        echo "<pre>";
        while ($eventos = $res->fetch_assoc()) {
         echo $eventos["nombre_evento"] . " <br>" ;
        }
        echo "</pre>";


*/

        $calendario = array();
        while ($eventos = $res->fetch_assoc()) {
          $fecha=  $eventos["fecha_evento"];
          $evento = array(
            'titulo' => $eventos["nombre_evento"] ,
            'fecha' => $eventos["fecha_evento"] ,
            'hora' => $eventos["hora_evento"] ,
            'categoia' => $eventos["cat_evento"] ,
            'icono' => $eventos["icono"] ,
            'invitado' => $eventos["nombre_invitado"] . " " . $eventos["apellido_invitado"]

          );
          $calendario[$fecha][]= $evento;
         }

         foreach ($calendario as $dia => $lista_eventos) {
           echo "<h3>";
            echo '<i class="fa fa-calendar" aria-hiden="true"></i>';
            //UNIX
            setlocale(LC_TIME, 'es_ES.UTF-8');
            //Windows
            //setlocale(LC_TIME, "spanish");
            //echo date("F j, Y", strtotime($dia)); //no acepta formateo de fecha
            echo strftime("%A, %d de %b del %Y", strtotime($dia)); //si acepta formateo de fecha
           echo "</h3>";

           foreach ($lista_eventos as $evento ) {
             echo '<div class="dia">';
             echo '<p class="titulo" >';
              echo $evento["titulo"];
              //ar_dump($evento);
              echo "</p>";
              echo '<p class="hora" >';
               echo '<i class="fa fa-clock" aria-hiden="true"></i> ';
               echo $evento["fecha"] . " " . $evento["hora"];
               echo "</p>";
               echo '<p>';
                echo '<i class="fa '. $evento["icono"] .'"></i> ' . $evento["categoia"];
                //ar_dump($evento);
                echo "</p>";
               echo '<p>';
                echo '<i class="fa fa-user" aria-hiden="true"></i> ';
                echo $evento["invitado"];
                echo "</p>";


             echo "</div>";
           }
         }





         ?>



     </div> <?php // NOTE: dic Calendario ?>
     <?php


              /*
              echo "<pre>";
              var_dump($calendario);
              echo "</pre>";
              */




      ?>

     <?php $conn->close(); ?>


  </section>

  <?php include_once 'includes/templates/footer.php'; ?>
