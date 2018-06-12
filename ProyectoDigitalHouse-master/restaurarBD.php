<?php

require_once('tools.php');

  if (verificarLogueo()){
    header('Location:conexion.php');
    exit;
}

$usuario= '';

$errores = [];



if ($_POST){



  $usuario = trim($_POST['email']); //elimina los espacios del nombre de usuario recbida

 $errores = validarDatosDelLogin($_POST);



  if (empty($errores)) {
			$usuario = existeEmail($usuario);

loguear($usuario);
			if (isset($_POST["recordar"])) {
	        setcookie('id', $usuario['id'], time() + 3600 * 24 * 30);
	      }
      header('Location:conexion.php');

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
    <link rel="stylesheet" href="css/style.css">

    <title>Ingresar a Good Job</title>

  </head>
  <body>
      <?php include('cabeza.php') ?>
<div class="transparencia">
    <div class="headcont">

    <h3>Ingresar</h3>
    </div>

  </header>
</header>


    <form class="usuario" action="" method="post">
  <div class="imgcontainer">
    <img src="https://cdn.iconscout.com/public/images/icon/free/png-512/avatar-user-hacker-3830b32ad9e0802c-512x512.png" alt="Avatar" class="avatar">

  </div>

  <div class="container">
    <label><b>Usuario (Direccion de Email):</b></label>
      <input type="text" placeholder="" name="email" value="<?php echo $usuario;  ?>">
    <?php if (isset($errores['email'])): ?>
      <br>
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

    <button type="submit">Restaurar</button>

  </div>

</form>

</div>
  </body>
</html>
