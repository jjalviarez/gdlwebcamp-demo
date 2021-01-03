<?php include_once 'includes/templates/header.php'; ?>

  <section class="seccion contenedor">
    <h2>La Mejor conferencia de diseño web de Español </h2>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

  </section> <!-- NOTE: seccion -->

  <section class="programa">
    <div class="contenedor-video">
      <video  autoplay loop oster="img/bg-talleres.jpg" muted>
        <source src="video/video.mp4" type="video/mp4">
        <source src="video/video.webm" type="video/webm">
        <source src="video/video.ogv" type="video/0gg">

      </video>

    </div> <!-- NOTE: contenedor video -->

    <div class="contenido-programa">
      <div class="contenedor">
        <div class="programa-evento">
          <h2>Programa del Evento</h2>

          <?php
              try {
                require_once("includes/funciones/bd_conexion.php");
                $sql = "SELECT * FROM `categoria_evento`";
                $res = $conn->query($sql);
              } catch (\Exception $e) {
                echo $e->getMessage();
              }
           ?>

          <nav class="menu-programa">
            <?php while ($cat = $res->fetch_array(MYSQLI_ASSOC)) { ?>

              <a href="#<?php echo strtolower($cat['cat_evento']); ?>"><i class="fas <?php echo $cat['icono'];?>"></i><?php echo $cat['cat_evento'];?></a>


            <!-- NOTE: testimoniales
            <a href="#talleres"><i class="fas fa-code"></i>Talleres</a>
            <a href="#conferencias"><i class="fas fa-comment"></i>Conferencia</a>
            <a href="#seminarios"><i class="fas fa-university"></i>Seminarios</a>
            -->

            <?php } ?>

          </nav>


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
                $result->free();
              } while ($conn->next_result() || $conn->more_results());?>



              <?php foreach ($programa as $tipo_evento => $lista_eventos) {?>
                <div id="<?php echo strtolower($tipo_evento); ?>" class="info-cursos ocultar clearfix">
                  <?php foreach ($lista_eventos as $evento ) { ?>
                  <div class="detalle-evento">
                    <h3><?php echo $evento["titulo"]; ?></h3>
                    <p><i class="fas fa-clock"></i><?php echo $evento["hora"]; ?></p>
                    <?php setlocale(LC_TIME, 'es_ES.UTF-8');?>
                    <p><i class="fas fa-calendar"></i><?php echo strftime("%A, %d de %b del %Y", strtotime($evento["fecha"]));?></p>
                    <p><i class="fas fa-user"></i><?php echo $evento["invitado"]; ?></p>
                  </div> <!-- NOTE:detalle-evento -->
              <?php   }?>
              <a href="calendario.php" class="button float-right">Ver todos</a>
              </div> <!-- NOTE:info-cursos -->
              <?php } ?>






<!-- NOTE: tipo evento
          <div id="talleres" class="info-cursos ocultar clearfix">
            <div class="detalle-evento">
              <h3>HTML5, CSS3 y JS 1</h3>
              <p><i class="fas fa-clock"></i>16:00</p>
              <p><i class="fas fa-calendar"></i>10 Dic</p>
              <p><i class="fas fa-user"></i>Jorge Alviarez</p>
            </div>
            <div class="detalle-evento">
              <h3>Responsive WEB Desing</h3>
              <p><i class="fas fa-clock"></i>20:00</p>
              <p><i class="fas fa-calendar"></i>10 Dic</p>
              <p><i class="fas fa-user"></i>Jorge Alviarez</p>
            </div>
            <a href="#" class="button float-right">Ver todos</a>
          </div>

          <div id="conferencias" class="info-cursos ocultar clearfix">
            <div class="detalle-evento">
              <h3>Como ser Freelancer</h3>
              <p><i class="fas fa-clock"></i>10:00</p>
              <p><i class="fas fa-calendar"></i>10 Dic</p>
              <p><i class="fas fa-user"></i>Gregorio Sanchez</p>
            </div>
            <div class="detalle-evento">
              <h3>Tecnologias de futuro</h3>
              <p><i class="fas fa-clock"></i>20:00</p>
              <p><i class="fas fa-calendar"></i>10 Dic</p>
              <p><i class="fas fa-user"></i>Jorge Alviarez</p>
            </div>
            <a href="#" class="button float-right">Ver todos</a>
          </div>

          <div id="seminarios" class="info-cursos ocultar clearfix">
            <div class="detalle-evento">
              <h3>Diseño UI/UX para moviles</h3>
              <p><i class="fas fa-clock"></i>17:00</p>
              <p><i class="fas fa-calendar"></i>11 Dic</p>
              <p><i class="fas fa-user"></i>Susam Sanchez</p>
            </div>
            <div class="detalle-evento">
              <h3>Aprende a programar en una mañana</h3>
              <p><i class="fas fa-clock"></i>10:00</p>
              <p><i class="fas fa-calendar"></i>11 Dic</p>
              <p><i class="fas fa-user"></i>Jorge Alviarez</p>
            </div>
            <a href="#" class="button float-right">Ver todos</a>
          </div>
-->

        </div> <!-- NOTE: Programa evento -->
      </div> <!-- NOTE: contenedor -->
    </div> <!-- NOTE: programa -->
  </section> <!-- NOTE: programa -->



  <?php include_once 'includes/templates/invitados.php'; ?>


  <div class="contador paralax" >
    <div class="contenedor">
      <ul class="resumen-evento animar clearfix">
        <li>
          <p class="numero">0</p>
          Invitados
        </li>
        <li>
          <p class="numero">0</p>
          Talleres
        </li>
        <li>
          <p class="numero">0</p>
          Dias
        </li>
        <li>
          <p class="numero">0</p>
          Conferencias
        </li>
      </ul>
    </div>
  </div>



  <section class="precios seccion">

    <h2>Precios</h2>
    <div class="contenedor">
      <ul class="lista-precios clearfix">
        <li>
          <div class="tabla-precios">
            <h3>Pase por Dia</h3>
            <p class="numero">$30</p>
            <ul>
              <li>Bocadillos gratis</li>
              <li>Todas Las Conferencias</li>
              <li>Todos Los Talleres</li>
            </ul>
            <a href="#" class="button hollow">Comprar</a>
          </div>
        </li>
        <li>
          <div class="tabla-precios">
            <h3>Todos Los Dias</h3>
            <p class="numero">$50</p>
            <ul>
              <li>Bocadillos gratis</li>
              <li>Todas Las Conferencias</li>
              <li>Todos Los Talleres</li>
            </ul>
            <a href="#" class="button">Comprar</a>
          </div>
        </li>
        <li>
          <div class="tabla-precios">
            <h3>Pase por 2 Dias</h3>
            <p class="numero">$45</p>
            <ul>
              <li>Bocadillos gratis</li>
              <li>Todas Las Conferencias</li>
              <li>Todos Los Talleres</li>
            </ul>
            <a href="#" class="button hollow">Comprar</a>
          </div>
        </li>
      </ul>

    </div>
  </section>

  <div class="mapa" id="mapa">

  </div>

  <section class="seccion">
    <h2>Testimoniales</h2>
    <div class="testimoniales contenedor clearfix">
        <div class="testimonial">
          <blockquote>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>


            <footer class="info-testimonial clearfix">
              <img src="img/testimonial.jpg" alt="imagen testimonial">
              <cite>Oswaldo Aponte Scovedo <span>Diseñador en @prisma</span> </cite>
            </footer>
          </blockquote>
        </div> <!-- NOTE: Testimonial -->
        <div class="testimonial">
          <blockquote>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>


            <footer class="info-testimonial clearfix">
              <img src="img/testimonial.jpg" alt="imagen testimonial">
              <cite>Oswaldo Aponte Scovedo <span>Diseñador en @prisma</span> </cite>
            </footer>
          </blockquote>
        </div> <!-- NOTE: Testimonial -->
        <div class="testimonial">
          <blockquote>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>


            <footer class="info-testimonial clearfix">
              <img src="img/testimonial.jpg" alt="imagen testimonial">
              <cite>Oswaldo Aponte Scovedo <span>Diseñador en @prisma</span> </cite>
            </footer>
          </blockquote>
        </div> <!-- NOTE: Testimonial -->
      </div>
  </section> <!-- NOTE: testimoniales -->


  <div class="newsletter paralax">
    <div class="contenido contenedor">
      <p>Resgistrate al newsletter:</p>
      <h3>GdlwebCam</h3>
      <a href="#" class="button transparente">Registro</a>
    </div> <!-- NOTE: contenido -->

  </div> <!-- NOTE:  newsletter -->

  <section class="seccion">
    <h2>Faltan</h2>
    <div class="cuenta-regresiva contenedor">
      <ul>
        <li> <p id="dias" class="numero"></p>Dias</li>
        <li> <p id="horas" class="numero"></p>Horas</li>
        <li> <p id="minutos" class="numero"></p>Minutos</li>
        <li> <p id="segundos" class="numero"></p>Segundos</li>
      </ul>

    </div>

  </section>

  <?php include_once 'includes/templates/footer.php'; ?>
