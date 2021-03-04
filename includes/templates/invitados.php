<?php
try {
  require_once("includes/funciones/bd_conexion.php");
  $sql = "SELECT * FROM `invitados`";
  $res = $conn->query($sql);
} catch (\Exception $e) {
  echo $e->getMessage();
}
?>


<?php


$invitados = array();
while ($invitado = $res->fetch_assoc()) {
  $invit = array(
    'invitado' => $invitado["nombre_invitado"] . " " . $invitado["apellido_invitado"],
    'descripcion' => $invitado["descripcion"],
    'imagen' => $invitado["url_imagen"],
    'id' => $invitado["invitado_id"]
  );
  $invitados[] = $invit;
}
?>

<section class="invitados contenedor seccion">
  <h2>Nuestros Invitados</h2>
  <ul class="lista-invitados clearfix">
    <?php foreach ($invitados as $invitado) {    ?>
      <li>
        <div class="invitado">
          <a class="invitado-info" href="#invitado<?php echo $invitado['id']; ?>">
            <img src="img/<?php echo $invitado['imagen']  ?>" alt="imagen invitado<?php echo " " . $invitado['invitado']  ?>">
            <p><?php echo $invitado['invitado']  ?></p>
          </a>
        </div>
      </li>
      <div style="display:none;">
        <div class="invitado-info" id="invitado<?php echo $invitado['id']; ?>">
          <h2><?php echo $invitado['invitado'];  ?></h2>
          <img src="img/<?php echo $invitado['imagen']  ?>" alt="imagen invitado<?php echo " " . $invitado['invitado']  ?>">
          <p> <?php echo $invitado['descripcion']; ?> </p>
        </div>
      </div>
    <?php } ?>
  </ul>
</section>



<?php $conn->close(); ?>
