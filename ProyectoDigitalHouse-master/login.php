<?php
include_once('autoload.php');
use GoodJob\Modelos\Usuario;
use GoodJob\Modelos\Autentificador;
use GoodJob\Repositorio\RepositorioMysql;
use GoodJob\Modelos\Validador;
/* Verifico que el usuario no este logueado en caso que si lo este
lo dirijo a la pagina principal y corto la ejecución del codigo */
if (Autentificador::verificarLogueo()) {
    header('Location:inicio.php');
    exit;
}

$email= '';
if ($_POST){

$validacion= new Validador($_POST);
$errores = $validacion->validarLogin();
$repositorio= new RepositorioMySql();
$email = trim($_POST['email']); //elimina los espacios del nombre de usuario recbida

  if ($errores === []) {
			$usuario = $repositorio->existeEmail($email);

			if (isset($_POST["recordar"])) {
	        setcookie('id', $usuario['id'], time() + 3600 * 24 * 30);
	      }
        $usuarioObj = new Usuario($usuario['email'],$usuario['usuario'],$usuario['pass'],$usuario['nombre'],$usuario['apellido'],$usuario['foto_perfil'],$usuario['nacimiento']);

        Autentificador::loguearInicio($usuarioObj);
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
    <label><b>Direccion de Email:</b></label>
      <input type="text" placeholder="" name="email" value="<?php echo $email;  ?>">
    <?php if (isset($errores['email'])): ?>
      <br>
								<span>
									<b class="glyphicon glyphicon-exclamation-sign"></b>
									<?=$errores['email'];?>
								</span>
						<?php endif; ?>
            <br>
    <label><b>Contraseña:</b></label>
    <input type="password" placeholder="" name="pass" >
    <?php if (isset($errores['pass'])): ?>
								<span>
									<b class="glyphicon glyphicon-exclamation-sign"></b>
									<?=$errores['pass'];?>
								</span>
							<?php endif; ?>
    <button type="submit">Cargar</button>
    <label>
      <input class="recordar" type="checkbox" checked="checked" name="recordar"> Recordarme
    </label>
  </div>
  <div class="container" style="background-color: rgba(0,0,0,0.5) ">
    <span ><a class="pass" href="contraseña.php">¿Te olvidaste la contraseña?</a></span>
  </div>
</form>
</div>
  </body>
</html>
