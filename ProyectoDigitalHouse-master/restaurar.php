<?php
include_once('Repositorio/BaseDeDatos.php');
if ($_POST) {
  $db = new BaseDeDatos($_POST['user'], $_POST['pass']);
  $db->crear();
};
  ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="css/style.css">

    <title>Ingresar a Good Job</title>

  </head>
  <body>
      <?php include('cabeza.php') ?>
<div class="transparencia">
    <div class="headcont">
    <h3>Restaurar base de datos</h3>
    </div>
  </header>
</header>
    <form class="usuario" action="" method="post">
  <div class="imgcontainer">
    <img src="https://cdn.iconscout.com/public/images/icon/free/png-512/avatar-user-hacker-3830b32ad9e0802c-512x512.png" alt="Avatar" class="avatar">
  </div>
  <div class="container">
    <label><b>Usuario:</b></label>
      <input type="text" placeholder="" name="user" value="">
      <br>
								<span style="color: red;">
									<b class="glyphicon glyphicon-exclamation-sign"></b>
								</span>
    <label><b>Contraseña:</b></label>
    <input type="password" placeholder="" name="pass" >
								<span style="color: red;">
									<b class="glyphicon glyphicon-exclamation-sign"></b>
								</span>
    <button type="submit">Restaurar</button>
  </div>
</form>
</div>
  </body>
</html>
