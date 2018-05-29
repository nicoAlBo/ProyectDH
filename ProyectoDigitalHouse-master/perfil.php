<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
      <h1>registro OK</h1>

      <?php
    session_start();

    echo 'Bienvenido '.$_SESSION['usuario'];

     session_destroy();
       ?>

       ahora  <a href="login.php">logeate</a>
  </body>
</html>
