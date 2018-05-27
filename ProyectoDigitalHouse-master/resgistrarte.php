<?php

	require_once('funciones.php');
	if (estaLogueado()) {
		header('location: perfil.php');
		exit;
	}
	// Array de países para el foreach en el select
	$paises = ['Argentina', 'Brasil', 'Colombia','Chile','Pagaguay','Uruguay'];
	// Variables para persistencia
	$name = '';
	$email = '';
	$pais = '';
	// Array de errores vacío
	$errores = [];
	// Si envían algo por $_POST
	if ($_POST) {
		// Persisto los datos con la información que envía el usuario por $_POST
		$name = trim($_POST['name']);
		$email = trim($_POST['email']);
		$pais = trim($_POST['pais']);
		// Valido y guardo en errores
		$errores = validar($_POST, 'avatar');
		// Si el array de errorres está vacío, es porque no hubo errores, por lo tanto procedo con lo siguiente
		if (empty($errores)) {
			$errores = guardarImagen('avatar');
			if (empty($errores)) {
				// En la variable $usuario, guardo al usuario creado con la función crearUsuario() la cual recibe los datos de $_POST y el avatar
				$usuario = guardarUsuario($_POST, 'avatar');
				// Logueo al usuario y por lo tanto no es necesario el re-direct
				loguear($usuario);
			}
		}
	}
?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link  href="css/login.css" rel="stylesheet">

    <title>Resgistrate a GJ</title>
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
    <form class="" action="" method="">
      <div class="container contform">
        <div class="forma">
      <label>Nombre
      <input type="text" name="nombre" value="" required>
      </label>

      <label>Apellido
        <input type="text" name="apellido" value="" required>
      </label>

        <label>Usuario
  <input type="text" name="usuario" value="" required>
</label>
</div>
<div class="formb">


<label>Correo Electronico
  <input type="email" name="correo" value="" required placeholder="usuario@email.com">
</label>

<br>
<label>Fecha de nacimiento
<input type="date" name="" value="" min="1950-01-01" max="2019-01-01">
</label>
</select>

  <label>Contraseña
    <input type="password" name="password" value="">
  </label>
</div>
  <button type="submit">Enviar</button>

    </div>
  </form>

</div>

  </div>
  </body>
</html>
