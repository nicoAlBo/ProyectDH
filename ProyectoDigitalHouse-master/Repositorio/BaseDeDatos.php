<?php
class BaseDeDatos {


  private $user;
  private $pass;

  public function __construct($user, $pass) {

    $this->setUser($user);
    $this->setPass($pass);
  }

  public function setUser($user) {
    $this->user = $user;
  }

  public function setPass($pass) {
    $this->pass = $pass;
  }

  public function getUser($user){
    return $this->$user;
  }

  public function getPass($pass){
    return $this->$pass;
  }

  public function crear() {
    try {
      $opt = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
      $baseDatos = new PDO('mysql:host=127.0.0.1', getUser(), getPass();
      $query = $baseDatos->query('CREATE DATABASE goodjob');
      $query = $baseDatos->query('USE goodjob');
      $query = $baseDatos->query('CREATE TABLE usuarios (
        id INT(11) NOT NULL auto_increment primary KEY,
        nombre varchar(100),
        apellido varchar(100),
        usuario varchar(100) unique NOT NULL,
        email varchar(100) unique NOT NULL,
        pass varchar(100),
        nacimiento DATE,
        foto_perfil varchar(200)
      )');
    } catch (PDOEXCEPTION $exc) {
      echo $exc->getMessage();
    }

    echo 'Has creado la base de datos';
  }
}
