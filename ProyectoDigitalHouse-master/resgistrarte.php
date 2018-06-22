<?php

require_once('funciones.php');
require_once('autoload.php');
use GoodJob\Modelos\Usuario;
use GoodJob\Modelos\Autentificador;

use GoodJob\Repositorio\RepositorioMysql;
if (estaLogueado()) {
header('location: perfil.php');
exit;
}


$errores = [];
$nombre = $apellido = $usuario = $fecha = $email = $pass= '';



if ($_POST) {

$nombre = trim($_POST['nombre']);

$apellido = trim($_POST['apellido']);

$usuario = trim($_POST['usuario']);

$fecha = trim($_POST['fecha']);

$email = trim($_POST['email']);

$pass= trim($_POST['pass']);



$errores = validar($_POST);

$usuario = new Usuario($email,$usuario,$pass,$nombre,$apellido,guardaPerfil('avatar'),$fecha);
$repositorio= new RepositorioMysql();

if (empty($errores)) {
$repositorio->guardarUsuario($usuario);
Autentificador::loguear($usuario);

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
		<link rel="stylesheet" href="css/style.css">


    <title>Resgistrate a Good job</title>

  </head>
  <body>
<?php include('cabeza.php') ?>
<div class="transparencia">




<h3> Registrate </h3>
<div class="formulario">
    <form class="" action="" method="POST" enctype="multipart/form-data">
      <div class="container contform">
        <div class="forma">
      <label>Nombre  </label>
  <input type="text" name="nombre" value="<?php echo $nombre;?>" >

      <label>Apellido
        <input type="text" name="apellido" value="<?php echo $apellido;?>" >
      </label>

        <label>Usuario
  <input type="text" name="usuario" value="<?php echo $usuario;?>" >
</label>
</div>
<div class="formb">


<label>Correo Electronico
  <input type="text" name="email" value="<?php echo $email;?>">
</label>

<br>
<label>Fecha de nacimiento
<input type="date" name="fecha" value="<?php echo $fecha;?>" min="1950-01-01" max="2019-01-01">
</label>
</select>

  <label>Contraseña
    <input type="password" name="pass" value="">
  </label>

<label><p>Foto de perfil  </p></label> <br>
<input id="regAvatar" type="file" name="avatar" value="">
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
