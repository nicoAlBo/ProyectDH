<?php

session_start();

if (isset ($_COOKIE['id'])) {

    $_SESSION['id']=$_COOKIE['id'];

}

function loguear($usuario) {
		// Guardo en $_SESSION el ID del USUARIO
	   $_SESSION['id'] = $usuario['id'];
		header('location: perfil.php');
		exit;
	}

function obtenerDatosDeUsuario() {

		$usuariosJson = file_get_contents('usuarios.json');

		$usuariosArray = explode(PHP_EOL, $usuariosJson);

		array_pop($usuariosArray);
		// Creo un array vacio, para guardar los usuarios
		$usuariosData = [];
		// Recorremos el array y generamos por cada usuario un array del usuario
		foreach ($usuariosData as $usuario) {
			$usuariosData[] = json_decode($usuario, true);
		}
		return $usuariosData;
	}


function existeEmail($email){
  // Traigo todos los usuarios
  $usuariosJson = obtenerDatosDeUsuario();
  // Recorro ese array
  foreach ($usuariosJson as $unUsuario) {
    // Si el mail del usuario en el array es igual al que me llegó por POST, devuelvo al usuario
    if ($unUsuario['unname'] == $email) {
      return $unUsuario;
    }
  }
  return false;
}


function verificarLogueo(){

    return isset ($_SESSION ['id']);

}

function validarDatosDelLogin($datosPost){
  $devolucionDeDatos =[];

  $username= trim($datosPost['uname']);
  $pass = trim($datosPost['psw']);

  if ($username ==''){
        $devolucionDeDatos['uname'] = 'Ingrese tu email';

      } elseif (!filter_var($username, FILTER_VALIDATE_EMAIL)){
                $devolucionDeDatos['uname']= 'Ingresa correctamente tu email';
              } elseif (!$usuario = existeEmail($username)) {
    $devolucionDeDatos['uname'] = 'Tu email no fue registrado';
  } else {

     $usuario = existeEmail($username);

    // Pregunto si coindice la password escrita con la guardada en el JSON
      if (!password_verify($pass, $usuario["psw"])) {
        $devolucionDeDatos['pass'] = "La contraseña no es correcta";
      }
  }
  return $devolucionDeDatos;
}

























 ?>
