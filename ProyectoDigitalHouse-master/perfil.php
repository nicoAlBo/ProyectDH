<?php
require_once('tools.php');

$email= $_SESSION['email'];
$nombreDeUsuario = obtenerNombreDeUsuario($email);
$nombreDeUsuario= $nombreDeUsuario['usuario'];


echo 'Bienvenido '.$nombreDeUsuario;

session_destroy();
 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title></title>
</head>
<body>

</body>
</html>
