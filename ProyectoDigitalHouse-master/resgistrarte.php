<?php
require_once('funciones.php');
require_once('autoload.php');
use GoodJob\Modelos\Usuario;
use GoodJob\Modelos\Autentificador;
use GoodJob\Repositorio\RepositorioMysql;
use GoodJob\Modelos\Validador;


if (Autentificador::verificarLogueo()) {
    header('Location:inicio.php');
    exit;
}

$nombre = $apellido = $user = $fecha = $email = $pass= '';
if ($_POST) {
  $nombre = trim($_POST['nombre']);
  $apellido = trim($_POST['apellido']);
  $user = trim($_POST['usuario']);
  $fecha = trim($_POST['fecha']);
  $email = trim($_POST['email']);
  $pass= trim($_POST['pass']);

  $errores = new Validador($_POST);
  $errores = $errores->validarRegistro();

  $usuario = new Usuario($email,$user,$pass,$nombre,$apellido,guardaPerfil('avatar'),$fecha);
  $repositorio= new RepositorioMysql();

if ($errores === []) {
  $repositorio->guardarUsuario($usuario);
  Autentificador::loguearPerfil($usuario);
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
<?php include('cabeza.php'); ?>
<div class="transparencia">
  <div class="headcont">
<h3> Registrate </h3>
</div>
<div class="formulario">
    <form  method="post" action="" enctype="multipart/form-data">
      <div class="container contform">
        <div class="forma">
      <label>Nombre  </label>
  <input type="text" name="nombre" value="<?php echo $nombre;?>" >
    <span><?php if (isset($errores['nombre'])):
      echo $errores['nombre'];
    else: echo '';
    endif; ?></span>
    <br>
      <label>Apellido</label>
        <input type="text" name="apellido" value="<?php echo $apellido;?>" >

      <span><?php if (isset($errores['apellido'])):
        echo $errores['apellido'];
      else: echo '';
      endif; ?></span>
      <br>
        <label>Usuario</label>
  <input type="text" name="usuario" value="<?php echo $user;?>" >

<span><?php if (isset($errores['usuario'])):
  echo $errores['usuario'];
else: echo '';
endif; ?></span>
</div>
<div class="formb">
<label>Correo Electronico</label>
  <input type="text" name="email" value="<?php echo $email;?>">

<span><?php if (isset($errores['email'])):
  echo $errores['email'];
else: echo '';
endif; ?></span>
<br>
<label>Fecha de nacimiento</label>
<input type="date" name="fecha" value="<?php echo $fecha;?>" min="1950-01-01" max="2019-01-01">

<span><?php if (isset($errores['fecha'])):
  echo $errores['fecha'];
else: echo '';
endif; ?></span>
<br>
  <label>Contraseña</label>
    <input type="password" name="pass" value="">

  <span><?php if (isset($errores['pass'])):
    echo $errores['pass'];
  else: echo '';
  endif; ?></span>
  <br>
<label>Foto de perfil </label> <br>
<input id="regAvatar" type="file" name="avatar" value="">
</div>
  <button type="submit">Enviar</button>
</div>
  </form>
</div>
</div>

  </body>
</html>
