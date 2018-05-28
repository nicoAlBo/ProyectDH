<?php

require_once('tools.php'); //incluimos las funciones programadas en otro archivo

/* Verifico que el usuario no este logueado en caso que si lo este
lo dirijo a la pagina principal y corto la ejecución del codigo */
if (verificarLogueo()){
    header('location:index.php');
    exit;
}

$usuario= ''; // el nombre debe ser persistente si esta bien

$errores = [];



if ($_POST){
echo "hola";

  $usuario = trim($_POST['email']); //elimina los espacios del nombre de usuario recbida

  $errores = validarDatosDelLogin($_POST);

  if (empty($errores)) {
			$usuario = existeEmail($username);
			loguear($usuario);
			// Seteo la cookie
			if (isset($_POST["recordar"])) {
	        setcookie('id', $usuario['id'], time() + 3600 * 24 * 30);
	      }
			header('location: perfil.php');
			exit;
		}
	}
























 ?>

















<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/login.css">
    <title>Ingresar a GJ</title>
  </head>
  <body>
<div class="transparencia">
<header>

  <header>
    <div class="headcont">

    <a href="index.php" target="_blank"><img class="arrow" src="css/imagenes/arrow.png" alt=""></a>
    <h3>Ingresar</h3>
    </div>

  </header>
</header>


    <form class="usuario" action="">
  <div class="imgcontainer">
    <img src="https://cdn.iconscout.com/public/images/icon/free/png-512/avatar-user-hacker-3830b32ad9e0802c-512x512.png" alt="Avatar" class="avatar">

  </div>

  <div class="container">
    <label><b>Usuario (Direccion de Email):</b></label>
    <input type="text" placeholder="" name="email">
    <?php if (isset($errores['email'])): ?>
								<span style="color: red;">
									<b class="glyphicon glyphicon-exclamation-sign"></b>
									<?=$errores['email'];?>
								</span>
						<?php endif; ?>

    <label><b>Contraseña:</b></label>
    <input type="password" placeholder="" name="pass" >
    <?php if (isset($errores['pass'])): ?>
								<span style="color: red;">
									<b class="glyphicon glyphicon-exclamation-sign"></b>
									<?=$errores['pass'];?>
								</span>
							<?php endif; ?>

    <button type="submit">Cargar</button>

    <label>
      <input type="checkbox" checked="checked" name="remember"> Recordarme
    </label>
  </div>

  <div class="container" style="background-color: rgba(0,0,0,0.5) ">
    <span ><a class="pass" href="contraseña.php">¿Te olvidaste la contraseña?</a></span>
  </div>
</form>

</div>
  </body>
</html>
