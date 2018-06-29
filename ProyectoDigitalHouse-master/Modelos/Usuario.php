<?php
namespace GoodJob\Modelos;

class Usuario {

  private $id;
  private $email;
  private $usuario;
  private $pass;
  private $nombre;
  private $apellido;
  private $nacimiento;
  private $avatar;

  public function __construct($email, $usuario, $pass, $nombre, $apellido, $avatar, $nacimiento) {
    $this->id = '';
    $this->setEmail($email);
    $this->setUsuario($usuario);
    $this->setPass($pass);
    $this->setNombre($nombre);
    $this->setApellido($apellido);
    $this->setNacimiento($nacimiento);
    $this->setAvatar($avatar);
  }

  public function passwordHash($pass){
    $passHasheado = password_hash($pass, PASSWORD_DEFAULT);
    return $passHasheado;
  }

    public function setNombre($nombre) {
      $this->nombre = $nombre;
    }

    public function getID() {
      return $this->id;
    }

    public function setPass($pass) {
      $this->pass = $pass;
    }
    public function getPass() {
      return $this->pass;
    }
    public function getNombre() {
      return $this->nombre;
    }

    public function setApellido($apellido) {
      $this->apellido = $apellido;
    }

    public function getApellido() {
      return $this->apellido;
    }

    public function setEmail($email) {
      $this->email = $email;
    }

    public function getEmail() {
      return $this->email;
    }

    public function setNacimiento($nacimiento) {
      $this->nacimiento = $nacimiento;
    }

    public function getNacimiento() {
      return $this->nacimiento;
    }

    public function setAvatar($avatar) {
      $this->avatar = $avatar;
    }

    public function getAvatar() {
      return $this->avatar;
    }

    public function setUsuario($usuario) {
      $this->usuario = $usuario;
    }

    public function getUsuario() {
      return $this->usuario;
    }

}
 ?>
