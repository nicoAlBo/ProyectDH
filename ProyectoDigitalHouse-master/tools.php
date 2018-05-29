<?php
  session_start();

if (isset ($_COOKIE['id'])) {

    $_SESSION['id']=$_COOKIE['id'];

}

function loguear($usuario) {
		$_SESSION=$_POST;
	   $_SESSION['id'] = $usuario['id'];


	}

function obtenerDatosDeUsuario() {

  $todosJson = file_get_contents('usuarios.json');

  $usuariosLista = explode(PHP_EOL, $todosJson);

  array_pop($usuariosLista);

  $listado = [];
  foreach ($usuariosLista as $usuarioA) {
    $listado[] = json_decode($usuarioA, true);
  }
  return $listado;
	}

  function obtenerNombreDeUsuario($email) {

    $todos = obtenerDatosDeUsuario();

    foreach ($todos as $solo1) {

      if ($solo1['email'] == $email) {

        return $solo1;
      }
    }
    return false;


  	}



function existeEmail($email){
  $todos = obtenerDatosDeUsuario();

  foreach ($todos as $solo1) {

    if ($solo1['email'] == $email) {

      return $solo1;
    }
  }
  return false;
}


function verificarLogueo(){


    return isset ($_SESSION ['id']);

}

function validarDatosDelLogin($datosPost){
  $devolucionDeDatos =[];

//Inicializo las variables con los datos que obtengo del post del login
  $usuario= trim($_POST['email']);
  $pass = trim($_POST['pass']);




  if ($usuario ==''){
        $devolucionDeDatos['email'] = 'Ingrese tu Email';

      }
elseif (!filter_var($usuario, FILTER_VALIDATE_EMAIL)){
                $devolucionDeDatos['email']= 'Ingresa correctamente tu email';
              } elseif (!$usuario = existeEmail($usuario)) {

    $devolucionDeDatos['email'] = 'Tu email no fue registrado';
  } else {

      // Pregunto si coindice la password escrita con la guardada en el JSON
      if (!password_verify($pass, $usuario["pass"])) {


        $devolucionDeDatos['pass'] = "La contraseña no es correcta";
      }
  }
  return $devolucionDeDatos;
}

























 ?>
