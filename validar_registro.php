<?php include_once 'includes/templates/header.php'; ?>

<section class="seccion contenedor">
  <h2>Resumen Registro</h2>
  <?php if (isset($_POST['submit'])) {
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $email = $_POST['email'];
    $regalo = $_POST['regalo'];
    $totla = $_POST['total_pedido'];
    $fecha = date("Y-m-d- H:i:s");

    //Pedidos
    $boleto = $_POST['boletos'];
    $camisas = $_POST['pedido_camisas'];
    $etiquetas = $_POST['pedido_etiquetas'];
    include_once 'includes/funciones/funciones.php';
    $pedido = productos_json($boleto, $camisas, $etiquetas);


    //eventos
    $registro = eventos_json($_POST['registro']);

    var_dump($registro);






 } ?>
</section>


<?php include_once 'includes/templates/footer.php'; ?>
