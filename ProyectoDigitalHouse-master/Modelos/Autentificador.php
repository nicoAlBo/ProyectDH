<?php
namespace GoodJob\Modelos;
use GoodJob\Modelos\Usuario;


abstract class Autentificador {




  function loguear(Usuario $usuario) {
    $_SESSION['usuario'] = $usuario->getUsuario();
     header('location: perfil.php');
     exit;
  }

}





?>
