<?php
namespace GoodJob\Repositorio;
use GoodJob\Modelos\Usuario;
use PDO;


class RepositorioMysql {

  private $host = 'mysql:host=127.0.0.1;dbname=goodjob';
  private $conex;
  private $dbuser = 'root';
  private $dbpass = 'root';

  public function __construct() {
    $this->conex = new PDO($this->host, $this->dbuser,  $this->dbpass,
      [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

  }

  public function guardarUsuario(Usuario $usuario) {
    $stmt = $this->conex->prepare("INSERT INTO usuarios (nombre, apellido, usuario, email, pass, nacimiento, foto_perfil)
    VALUES (:nombre, :apellido, :usuario, :email, :pass, :nacimiento, :foto_perfil)");
    $stmt->bindValue(':nombre', $usuario->getNombre());
    $stmt->bindValue('apellido', $usuario->getApellido());
    $stmt->bindValue('usuario', $usuario->getUsuario());
    $stmt->bindValue(':email', $usuario->getEmail());
    $stmt->bindValue(':pass', $usuario->passwordHash($usuario->getPass()));
    $stmt->bindValue(':nacimiento', $usuario->getNacimiento());
    $stmt->bindValue(':foto_perfil', $usuario->getAvatar());
    $stmt->execute();
  }

  public function traerTodos() {
    $stmt = $this->conex->prepare("SELECT * FROM usuarios");
    $stmt->execute();
    $results = $stmt->fetch(PDO::FETCH_ASSOC);
  }

  public function existeEmail($email) {
    $stmt = $this->conex->prepare("SELECT * FROM usuarios WHERE email=:email");
    $stmt->bindValue(':email', $email);
    $stmt->execute();
    $results = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($results) {
      return $results;
    } else {
      return false;
    }
  }

  public function traerPorId($id) {
    $stmt = $this->conex->prepare("SELECT * FROM usuarios WHERE id=:id");
    $stmt->bindValue(':id', $id);
    $stmt->execute();
    $results = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($results) {
      return $results;
    } else {
      return false;
    }

  }

  public function existeUsuario($usuario) {
    $stmt = $this->conex->prepare("SELECT * FROM usuarios WHERE usuario=:usuario");
    $stmt->bindValue(':usuario', $usuario);
    $stmt->execute();
    $results = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($results) {
      return $results;
    } else {
      return false;
    }
  }

}

 ?>
