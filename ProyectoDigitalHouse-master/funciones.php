<?php
	session_start();

	if (isset($_COOKIE['id'])) {
		$_SESSION['id'] = $_COOKIE['id'];
	}

	function crearUsuario($data) {
		$usuario = [
			'id' => traerUltimoID(),
			'nombre' => $data['nombre'],
			'apellido' => $data['apellido'],
			'usuario'=> $data['usuario'],
			'email' => $data['email'],
			'pass' => password_hash($data['pass'], PASSWORD_DEFAULT),

		];
	   return $usuario;
	}

	function validar($data) {
		$errores = [];
		$nombre = trim($_POST['nombre']);
		$apellido = trim($_POST['apellido']);
		$usuario = trim($_POST['usuario']);
		$email = trim($_POST['email']);
		$pass = trim($_POST['pass']);

		if ($nombre == '') {
			$errores['nombre'] = "Completa el campo nombre";
		}
		if ($apellido == '') {
			$errores['apellido'] = "Completa el campo Apellido";
		}

		if ($usuario == '') {
			$errores['usuario'] = "Completa el campo Usuario";

		}elseif (existeUsuario($usuario)) {
			$errores['usuario'] = "Este usuario ya existe.";
}

		if ($email == '') {
			$errores['email'] = "Completa tu email";
		} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

			$errores['email'] = "Por favor poner un email de verdad.";
		} elseif (existeEmail($email)) {
			$errores['email'] = "Este email ya existe.";
		}
		if ($pass == '') {
			$errores['pass'] = "Por favor completa tus contraseña";
		}

		return $errores;
	}

	function traerTodos() {

		$todosJson = file_get_contents('usuarios.json');

		$usuariosLista = explode(PHP_EOL, $todosJson);

		array_pop($usuariosLista);

		$listado = [];
		foreach ($usuariosLista as $usuarioA) {
			$listado[] = json_decode($usuarioA, true);
		}
		return $listado;
	}

	function traerUltimoID(){

		$usuarios = traerTodos();
		if (count($usuarios) == 0) {
			return 1;
		}

		$elUltimo = array_pop($usuarios);

		$id = $elUltimo['id'];

		return $id + 1;
	}

	function existeEmail($email){

		$todos = traerTodos();

		foreach ($todos as $solo1) {

			if ($solo1['email'] == $email) {
				return $solo1;
			}
		}
		return false;
	}

	function existeUsuario($usuario){

		$todos = traerTodos();

		foreach ($todos as $solo1) {

			if ($solo1['usuario'] == $usuario) {
				return $solo1;
			}
		}
		return false;
	}


	function guardarUsuario($data){
		$usuario = crearUsuario($data);
		$usuarioJSON = json_encode($usuario);

		file_put_contents('usuarios.json', $usuarioJSON . PHP_EOL, FILE_APPEND);

		return $usuario;
}
function validarLogin($data) {
		$arrayADevolver = [];
		$email = trim($data['email']);
		$pass = trim($data['pass']);
		if ($email == '') {
			$arrayADevolver['email'] = 'Completá tu email';
		} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			$arrayADevolver['email'] = 'Poné un formato de email válido';
		} elseif (!$usuario = existeEmail($email)) {
			$arrayADevolver['email'] = 'Este email no está registrado';
		} else {

      	if (!password_verify($pass, $usuario["pass"])) {
         	$arrayADevolver['pass'] = "Credenciales incorrectas";
      	}
		}
		return $arrayADevolver;
	}


	function loguear($usuario) {
		$_SESSION=$_POST;
	   $_SESSION['id'] = $usuario['id'];
		header('location: perfil.php');
		exit;
	}

	function estaLogueado() {
		return isset($_SESSION['id']);
	}

	function traerPorId($id){
		$todos = traerTodos();
		foreach ($todos as $usuario) {
			if ($id == $usuario['id']) {
				return $usuario;
			}
		}
		return false;
	}

  ?>
