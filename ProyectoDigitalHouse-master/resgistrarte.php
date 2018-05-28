<?php

	require_once('funciones.php');
	if (estaLogueado()) {
		header('location: perfil.php');
		exit;
	}

	$nombre = '';
	$apellido ='';
	$usuario = '';
	$email = '';
	$errores = [];
	$fecha ='';

	if ($_POST) {

		$nombre = trim($_POST['nombre']);

		$apellido = trim($_POST['apellido']);

		$usuario = trim($_POST['usuario']);

		$fecha = trim($_POST['fecha']);

		$email = trim($_POST['email']);

		$errores = validar($_POST);

			if (empty($errores)) {
					guardarUsuario($_POST);
				loguear($usuario);

		}else {

		}
	}
?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <link  href="css/login.css" rel="stylesheet">


    <title>Resgistrate a Good job</title>
  </head>
  <body>
<div class="transparencia">
    <header>
      <div class="headcont">

      <a href="index.php" target="_blank"><img class="arrow" src="css/imagenes/arrow.png" alt=""></a>
      <h3>Registrate</h3>
      </div>

</header>
<div class="formulario">
    <form class="" action="" method="POST">
			<img src="https://cdn.iconscout.com/public/images/icon/free/png-512/avatar-user-hacker-3830b32ad9e0802c-512x512.png" alt="Avatar" class="avatar">
      <div class="container contform">
        <div class="forma">
      <label>Nombre  </label>
  		<input type="text" name="nombre" value="<?php echo 	$nombre;?>" >

      <label>Apellido
        <input type="text" name="apellido" value="<?php echo 	$apellido;?>" >
      </label>

        <label>Usuario
  <input type="text" name="usuario" value="<?php echo $usuario;?>" >
</label>
</div>
<div class="formb">


<label>Correo Electronico
  <input type="email" name="email" value="<?php echo $email;?>">
</label>

<br>
<label>Fecha de nacimiento
<input type="date" name="fecha" value="<?php echo $fecha;?>" min="1950-01-01" max="2019-01-01">
</label>
</select>

  <label>Contraseña
    <input type="password" name="pass" value="">
  </label>
</div>
  <button type="submit">Enviar</button>
	<div class="container">
	<?php
	 foreach ($errores as $key => $value) {
	 		echo "<span> $value </span> <br>";
	 }

	 ?>
	</div>

    </div>




  </form>

</div>

	</div>
  </body>
</html>
