  <?php
session_start();
var_dump($_SESSION);
var_dump($_POST);
echo 'Bienvenido'.$_SESSION['nombre'];

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
