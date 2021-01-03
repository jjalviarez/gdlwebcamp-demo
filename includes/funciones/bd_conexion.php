<?php
  $conn = new mysqli("localhost", "root", "123456", "gdlwebcamp", "3306");
  if ($conn->connect_error) {
    // code...
    echo $error -> $conn->connect_error;
  }

 ?>
