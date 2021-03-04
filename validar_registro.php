<?php if (isset($_POST['submit'])) {
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $email = $_POST['email'];
    $regalo = $_POST['regalo'];
    $total = $_POST['total_pedido'];
    $fecha = date("Y-m-d- H:i:s");
    //Pedidos
    $boleto = $_POST['boletos'];
    $camisas = $_POST['pedido_camisas'];
    $etiquetas = $_POST['pedido_etiquetas'];
    include_once 'includes/funciones/funciones.php';
    $pedido = productos_json($boleto, $camisas, $etiquetas);
    //eventos
    $registro = eventos_json($_POST['registro']);
    try {
      require_once("includes/funciones/bd_conexion.php");
      $stmt = $conn->prepare("INSERT INTO registrados ( nombre_registrado, apellido_registrado, email_registrado, fecha_registro, pases_articulos, talleres_registrados, regalo, total_pagado) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
      $stmt->bind_param("ssssssis", $nombre, $apellido, $email, $fecha, $pedido, $registro, $regalo, $total);
      $stmt->execute();
      $stmt->close();
      $conn->close();
      header('Location: validar_registro.php?ok=1');
    } catch (\Exception $e) {
      echo $e->getMessage();
    }
  } ?>
<?php include_once 'includes/templates/header.php'; ?>
<section class="seccion contenedor">
  <h2>Resumen Registros</h2>
  <?php if (isset($_GET['ok'])) {
    if ($_GET['ok'] == "1")
      echo 'Pago Procesado Correctamente';

  } ?>
</section>
<?php include_once 'includes/templates/footer.php'; ?>
