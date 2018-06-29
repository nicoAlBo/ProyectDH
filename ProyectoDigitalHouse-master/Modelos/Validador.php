<?php
namespace GoodJob\Modelos;
use GoodJob\Repositorio\RepositorioMysql;

class Validador
 {
  private $datosPost;

  function __construct($datos)
  {
    $this->datosPost= $datos;

  }

  public function validarLogin(){

    $devolucionDeDatos =[];
    $repositorio= new RepositorioMysql();
    //Inicializo las variables con los datos que obtengo del post del login
    $usuario= trim($this->datosPost['email']);
    $pass = trim($this->datosPost['pass']);
    if ($usuario ==''){
          $devolucionDeDatos['email'] = 'Ingrese su Email';
        }
        if (!filter_var($usuario, FILTER_VALIDATE_EMAIL)){
          $devolucionDeDatos['email']= 'Ingrese correctamente su email';
        }
        if (!$repositorio->existeEmail($usuario)) {
      $devolucionDeDatos['email'] = 'Email no registrado';
    }
        $passHasheado = $repositorio->existeEmail($usuario);
        $passHasheado = $passHasheado['pass'];
        if (password_verify($pass, $passHasheado) === false) {
          $devolucionDeDatos['pass'] = "La contraseña no es correcta";
        }
    return $devolucionDeDatos;
}

  public function validarRegistro() {
    $errores = [];
    $repositorio= new RepositorioMysql();
    $nombre = trim($this->datosPost['nombre']);
    $apellido = trim($this->datosPost['apellido']);
    $usuario = trim($this->datosPost['usuario']);
    $fecha = trim($this->datosPost['fecha']);
    $email = trim($this->datosPost['email']);
    $pass = trim($this->datosPost['pass']);

      if ($nombre == '') {
       $errores['nombre'] = "Completa el campo nombre";
     }

      if ($apellido == '') {
       $errores['apellido'] = "Completa el campo Apellido";
     }

      if ($usuario == '') {
       $errores['usuario'] = "Completa el campo Usuario";
     } elseif ($repositorio->existeUsuario($usuario)) {
       $errores['usuario'] = "Este usuario ya existe.";
     }

      if ($fecha == '') {
       $errores['fecha'] = "Completa el campo fecha";
     } else {
       $edad= intval((strtotime("now")-strtotime($fecha))/31536000);
       if ($edad<18) {
       $errores['fecha'] = 'sos menor de edad';
     }
   }

      if ($email == '') {
       $errores['email'] = "Completa tu email";
      } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
       $errores['email'] = "Por favor poner un email de verdad.";
      } elseif ($repositorio->existeEmail($email)) {
       $errores['email'] = "Este email ya existe.";
     }

      if ($pass == '') {
       $errores['pass'] = "Por favor completa tus contraseña";
     }
       return $errores;
      }
}
 ?>
