<?php
namespace Goodjoob\Repositorio;

use PDO;

class RepositorioMysql {

  private $host;
  private $dbname;
  private $dbuser;
  private $dbpass;

  public function __construct() {

    $this->host = 'mysql:host=127.0.0.1';
    $this->dbname = 'goodjob_db';
    $this->dbuser = 'root';
    $this->dbpass = '';

    $repositorio = new PDO($this->host, $this->dbname, $this->dbuser,
    $this->dbpass);
  }

  public function guardarUsuario(Usuario $usuario) {
    $stmt = $repositorio->prepare("INSERT INTO $this->dbname nombre, apellido, usuario, email, pass, nacimiento, foto_perfil
    VALUES (:nombre, :apellido, :usuario, :email, :pass, :nacimiento, :foto_perfil)")
    $stmt = bindValue(':nombre', $usuario->getNombre());
    $stmt = bindValue('apellido', $usuario->getApellido());
    $stmt = bindValue('usuario', $usuario->getUsuario());
    $stmt = bindValue(':email', $usuario->getEmail());
    $stmt = bindValue(':pass', $ususario->passwordHash($usuario->getPass(), PASSWORD_DEFAULT))
  }


}

 ?>
